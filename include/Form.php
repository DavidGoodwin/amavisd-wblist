<?php
namespace AmavisWblist;

interface Form
{

    public function render();

    public function isValid(array $post);

    public function getValues();

}