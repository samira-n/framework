<?php

namespace App\Application\Config;
use Codin\Dot\Dot;

class Config implements ConfigInterface{

    // константа для игнорирования двух стандартных файлов при сканировании директории ('..' и '.')
    public const IGNORE_FILES = ['..', '.'];
    private static array $config;

    // статический метод для получения значения конфигурации по ключу
    public static function get(string $key): mixed{
        $dot = new Dot(self::$config);
        // возвращаем значение по указанному ключу, используя метод get из класса Dot
        return $dot->get($key);
    }

    // статический метод для инициализации данных конфигурации
    public static function init(): void{
        // путь к директории с файлами конфигурации
        $path = __DIR__ . "/../../../config";
        $files = scandir($path);
        // фильтруем файлы, удаляя из списка элементы, которые содержатся в константе IGNORE_FILES
        $files = array_filter($files, function($file){
            return !in_array($file, self::IGNORE_FILES);
        }); 

        foreach($files as $file){
            $data = include "$path/$file";
            if(is_array($data)){
                // используем basename для получения имени файла без расширения '.php' и сохраняем данные (вернет app)
                self::$config[basename($file, '.php')] = $data;
            }
            
            
        }

        
    }
}
?>