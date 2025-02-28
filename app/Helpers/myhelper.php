<?php

use App\Models\Category;

function getMessage()
{
    $category = Category::first();
    $name = $category->name;
    return $name;
}
