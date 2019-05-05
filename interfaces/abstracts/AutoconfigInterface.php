<?php

declare(strict_types = 1);

namespace app\interfaces\abstracts;

/**
 * Interface AutoconfigInterface
 * Данный интерфейс содержит объявление метода getConfig().
 */
interface AutoconfigInterface
{
    /**
     * Данный метод возвращает конфигурацию пользовательского модуля.
     *
     * @return array
     */
    public static function getConfig();
}