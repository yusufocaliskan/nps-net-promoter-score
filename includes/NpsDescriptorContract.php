<?php

interface NpsDescriptorContract
{
    public function __construct(int $score);

    public function getDescriptor(): string;

    public function getHexColorCode(): string;
}