<?php

namespace AmavisWblist;

class Template {

    private $template;
    private $variables = [];

    public function __construct() {
        $this->template = new \Smarty();
        $this->template->setTemplateDir(dirname(__FILE__) . '/../templates/');
        $this->template->setCacheDir(sys_get_temp_dir());
        $this->template->setCompileDir(sys_get_temp_dir());
        $this->template->setCachingType('none');


    }

    public function getInstance() {

        if(self::$instance == null) {
            self::$instance = new Template();
        }

        return self::$instance;
    }

    public function assign($key, $value) {
        if($value instanceof Form) {

            $this->template->assign($key . '_form', $value);
            $value = $value->render();
        }
        $this->template->assign($key, $value);

        $this->variables[$key] = $value;
    }

    public function display($template) {

        $this->assign('flash', Flash::get());

        Flash::reset();
        $this->template->assign('inner_template', $template);
        return $this->template->display('master.tpl');

    }
}
