<?php


function arrays_have_same_values (array $first, array $second)
{
    return count($first) === count($second) && ! array_diff($first, $second) && ! array_diff($second, $first);
}