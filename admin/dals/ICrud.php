<?php

interface ICrud
{
    function add($payload);

    function update($id, $payload);

    function listAll($page);

    function delete($id);

    function getCount();
}