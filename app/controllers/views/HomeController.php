<?php

namespace app\controllers\views;

use app\config\Constants;
use app\controllers;
use app\utils\MailGenerator;
use Psr\Http\Message\ServerRequestInterface as ReqInterface;
use Psr\Http\Message\ResponseInterface as ResInterface;

/**
 * Class ControlPanelController
 * @package Cocode\controllers
 */
class HomeController
{
    /**
     * @var \Slim\App $slimApp References to slim app instance
     */
    private $slimApp;

    /**
     * ControlPanelController constructor.
     * @param $app
     */
    public function __construct($app)
    {
        // Create a reference to Slim App to work with its methods.
        $this->slimApp = $app;
    }

    /**
     * @param ReqInterface $request
     * @param ResInterface $response
     * @param $arguments
     * @return mixed
     */
    public function renderHome(ReqInterface $request, ResInterface $response, $arguments)
    {
        $posts = controllers\BlogController::getPosts("./uploads/blog", "", 4);
        $mailError = (isset($request->getQueryParams()['m'])) ? $request->getQueryParams()['m'] : null;

        return $this->slimApp->view->render($response, 'home.php', array(
            'posts' => $posts,
            'mailError' => $mailError
        ));
    }

    /**
     * Comprueba si el reCaptcha es correcto mediante el uso de CURL
     * @param string $recaptcha La respuesta envíado por el formulario que contiene el reCaptcha
     * @return array Devuelve un array con la respuesta del servidor de Google
     */
    private function checkRecaptcha($recaptcha)
    {
        $googleApi = curl_init();

        curl_setopt($googleApi, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($googleApi, CURLOPT_POST, true);
        curl_setopt($googleApi, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($googleApi, CURLOPT_POSTFIELDS, array(
            'secret' => Constants::RECAPTCHA_SECRET,
            'response' => $recaptcha
        ));

        $result = curl_exec($googleApi);
        curl_close($googleApi);

        return json_decode($result, true);
    }

    public function sendEmail(ReqInterface $request, ResInterface $response, $arguments)
    {
        $name = filter_var($request->getParsedBody()['name'], FILTER_SANITIZE_STRING);
        $subject = filter_var($request->getParsedBody()['subject'], FILTER_SANITIZE_STRING);
        $email = filter_var($request->getParsedBody()['email'], FILTER_SANITIZE_STRING);
        $message = filter_var($request->getParsedBody()['message'], FILTER_SANITIZE_STRING);
        $recaptcha = $request->getParsedBody()['g-recaptcha-response'];

        $recaptchaResult = $this->checkRecaptcha($recaptcha);

        if (!$recaptchaResult['success'])
            return $response->withStatus(403)->withHeader('Location', '/?e=recaptcha');

        $mail = new MailGenerator();

        $body = '<!DOCTYPE html><html><head><meta name="viewport" content="width=device-width"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head><body>Consulta envíada desde el formulario de contacto de Nulltilus <br><div style="background-color: #ededed; border-radius: 4px; padding: 10px; box-sizing: border-box; font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">' . $message . '</div></body></html>';

        if(!$mail->sendEmail(array($email, $name != "" ? $name : ''), 'info@nulltilus.com', "[Consulta] " . $subject, $body))
            return $response->withStatus(403)->withHeader('Location', '/?m=true#contact');

        $document = new \DOMDocument();
        $document->validateOnParse = true;
        $document->loadHTMLFile('../app/views/contact_email.html');

        $document->getElementById('message')->nodeValue = $message;

        if ($mail->sendEmail(array('info@nulltilus.com', 'Nulltilus'), $email, "Formulario de contacto Nulltilus", $document->saveHTML()))
            return $response->withStatus(403)->withHeader('Location', '/?m=false#contact');

        return $response->withStatus(403)->withHeader('Location', '/?m=true#contact');
    }
}