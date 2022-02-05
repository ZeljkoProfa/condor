<?php

namespace Repository\FakeData;

class RemoteData
{
    public function getData()
    {
        return [
            'Google Analytics' => 450,
            'Positive Guys' => 950,
            'Visitor Analytics' => 1100,
            'Some other Analytics' => 631,
            'Fancy Analytics' => 645
        ];
    }
}