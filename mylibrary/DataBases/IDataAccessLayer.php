<?php

namespace MyLibrary\DataBases;

interface IDataAccessLayer
{
    function connect();
    function disconnect();
    function isConnected():bool;
    function selectData($queryStr):array;
    function executeCommand($queryStr):bool;
    function getValue(string $queryStr):int;
}