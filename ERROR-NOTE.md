   INFO  Seeding database.


   OverflowException

  Maximum retries of 10000 reached without finding a unique value

  at vendor\fakerphp\faker\src\Faker\UniqueGenerator.php:80
     76▕             $res = call_user_func_array([$this->generator, $name], $arguments);
     77▕             ++$i;
     78▕
     79▕             if ($i > $this->maxRetries) {
  ➜  80▕                 throw new \OverflowException(sprintf('Maximum retries of %d reached without finding a unique value', $this->maxRetries));
     81▕             }
     82▕         } while (array_key_exists(serialize($res), $this->uniques[$name]));
     83▕         $this->uniques[$name][serialize($res)] = null;
     84▕

  1   database\factories\CategoryFactory.php:31
      Faker\UniqueGenerator::__call("randomElement")

  2   vendor\laravel\framework\src\Illuminate\Database\Eloquent\Factories\Factory.php:527
      Database\Factories\CategoryFactory::definition()
