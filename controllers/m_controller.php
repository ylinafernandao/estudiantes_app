<?php

namespace controllers;

interface MController
{
    public function list();
    public function detail($id);
    public function create($request);
    public function update($id, $request);
    public function delete($id);
}