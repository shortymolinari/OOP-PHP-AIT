<?php

function clase_anónima()
{
    return new class {};
}

if (get_class(clase_anónima()) === get_class(clase_anónima())) {
    echo 'misma clase';
} else {
    echo 'clase diferente';
}