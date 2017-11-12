<?php

function create($class, $attributes = [])
{
    return factory('Lighthouse\\'.$class)->create($attributes);
}

function make($class, $attributes = [])
{
    return factory('Lighthouse\\'.$class)->make($attributes);
}
