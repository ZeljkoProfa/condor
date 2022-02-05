<?php

namespace Formatters;

interface FormatterInterface
{
    public function formatArrayToJson();
    
    public function formatTextToJson();
    
    public function formatCsvToJson();
}