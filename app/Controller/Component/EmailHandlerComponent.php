<?php
App::import('Vendor', 'PhpMailer', array('file' => 'PHPMailer' . DS . 'PHPMailerAutoload.php'));
App::import('Vendor', 'checkEmail', array('file' => 'checkEmail' . DS . 'autoload.php' ));


class EmailHandlerComponent extends PHPMailer{
    // phpmailer
    var $Mailer = 'smtp'; // choose 'sendmail', 'mail', 'smtp'
    var $unhtml_bin = '/usr/bin/unhtml';

    // component
    var $controller;

    function startup( &$controller )
    {

        $this->controller = &$controller;
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $this->SMTPDebug = 0;

        //Ask for HTML-friendly debug output
        $this->Debugoutput = 'html';

        $this->IsHTML(true);


        if(strtolower(Configure::read('mode'))=='live'){
            $this->isSMTP();
            $this->Host = 'relay-hosting.secureserver.net';
            $this->Port = 25;
            $this->SMTPAuth = false;
            $this->SMTPSecure = false;

        }else{
            $this->Host = 'smtp.gmail.com';
            $this->Port = 587;
            $this->SMTPSecure = 'tls';
            $this->SMTPAuth = true;
        }

        $this->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        /*$this->Username = Configure::read('auth_email');
        $this->Password = Configure::read('auth_password');*/

        $this->Username = 'fictionsoft50@gmail.com';
        $this->Password = 'Fsakabaka002';

    }

    function beforeRender(){

        Configure::write('debug',0);
    }


    function renderBody($view)
    {

        // render the view and use its output to set the body text of the email
        $this->Body = $this->controller->render('/Emails/html/' . $view);

        // reset the output of the controller
        $this->controller->output = '';

        // create plain text version of the email
        // create temporary files
        $html_file = tempnam(TMP, 'html_file');
        $text_file = tempnam(TMP, 'text_file');

        // write html to temporary file
        file_put_contents($html_file, $this->Body);

        // convert the html file to plain text
        //$cmd = "cat $html_file | $this->unhtml_bin > $text_file";
        //system($cmd);

        // set the plain text body of the email
        $this->AltBody = file_get_contents($text_file);

        // remove temporary files
        unlink($html_file);
        unlink($text_file);
    }


    function submit($info){

        if(!empty($info['to'])) {

            $email_from = (!empty($info['email_form'])) ? $info['email_form'] : Configure::read('email_form');

            $site_name = Configure::read('site_name');

            $smtp = Configure::read('SMTP');

            $reply_to = $email_from;


            $info['view_var']['site_name'] = $site_name;
            $email_bcc = (!empty($info['email_bcc'])) ? $info['email_bcc'] : $info['to'];

            $email_status = false;

            if ($smtp == true) {

                $this->controller->layout = 'ajax';
                $this->controller->set('data', $info['view_var']);

                // the email content is just a (html) view in app/views/{controller}/emails/testmail.ctp
                $this->renderBody($info['email_template']);


                // subject
                $this->Subject = $info['subject'];

                //Set who the message is to be sent to
                $this->addAddress($info['to']);


                //Set who the message is to be sent from
                $this->setFrom($email_from, $site_name);


                //Set an alternative reply-to address
                $this->addReplyTo($reply_to, $site_name);


                // send!
                $email_status = $this->Send();

                $this->controller->layout = 'default';

            } else {

                if ($_SERVER['HTTP_HOST'] != 'localhost') {
                    $this->controller->Email->to = $info['to'];
                    $this->controller->Email->bcc = $email_bcc;
                    $this->controller->Email->subject = $info['subject'];
                    $this->controller->Email->replyTo = $reply_to;
                    $this->controller->Email->from = $site_name . '<' . $email_from . '>';
                    $this->controller->Email->template = $info['email_template'];
                    $this->controller->Email->sendAs = 'html';
                    $this->controller->set('data', $info['view_var']);
                    //$this->Email->delivery = 'debug';
                    $email_status = $this->controller->Email->send();
                }
            }

            $info['is_email_sent'] = $email_status;

            return $email_status;

        }else{
            return false;
        }
    }


    public function reset() {
        $this->template = null;
        $this->to = array();
        $this->from = null;
        $this->replyTo = null;
        $this->return = null;
        $this->cc = array();
        $this->bcc = array();
        $this->subject = null;
        $this->additionalParams = null;
        $this->date = null;
        $this->attachments = array();
        $this->htmlMessage = null;
        $this->textMessage = null;
        $this->messageId = true;
        $this->delivery = 'mail';
    }

    /**
     * Variables to be set on render
     *
     * @param array $viewVars Variables to set for view.
     * @return array|$this
     */
    public function viewVars($viewVars = null) {
        if ($viewVars === null) {
            return $this->_viewVars;
        }
        $this->_viewVars = array_merge($this->_viewVars, (array)$viewVars);
        return $this;
    }

     public function initialize() {}
     public function shutdown() {}
     public function beforeRedirect() {}
}

