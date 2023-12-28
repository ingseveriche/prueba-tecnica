<?php

    class Ngrama 
    {

        private $level;
        private $filename;
        private $textngrama;

        public function __construct(int $n, string $filename) 
        {
            $this -> level = $n;
            $this -> filename = $filename;
            $this -> textngrama = array();
        }

        /**
         * Se convierte la información del archivo en un array, obteniendo palabras separadas.
         */
        public function conversion () 
        {

            if ( !file_exists($this -> filename) ) 
            {
                throw new Exception("¡El archivo no existe!");
            }

            if ( filesize($this -> filename) == 0 ) 
            {
                throw new Exception("¡El archivo esta vacio!");
            }

            //convertir archivo a texto
            $string_file = file_get_contents($this -> filename, FILE_USE_INCLUDE_PATH);

            //limpiar texto
            $characters_to_clean = array (".", ";", ",", ":", "-", "¡", "!", "¿", "?");
            $string_file = trim(strtolower($string_file));
            $string_file = str_replace($characters_to_clean, "", $string_file);

            //convertir texto en array
            $array_file = explode(" ", $string_file);

            $this->textngrama = $array_file;
        
        }

        /**
         * Organizar el trigrama en un array.
         * - Primera Parte: Se guardan las dos primeras palabras en la misma posicion y la tercera en la siguiente posicion.
         * - Segunda Parte: Se clasifican las frases iguales y las palabras que la componen.
         */
        public function trigrama () 
        {
            
            $phrases = $trigram = [];

            //Primera parte
            for ($position = 0; $position < count($this->textngrama); $position++) {
                
                if ($position < count($this->textngrama) - 2)
                {

                    $first_word = $this->textngrama[$position];
                    $second_word = $this->textngrama[$position + 1];
                    $third_word = $this->textngrama[$position + ($this->level - 1)];

                    if ($first_word AND $second_word AND $third_word)
                    {
                        $phrases[$position][1] = $first_word." ".$second_word;
                        $phrases[$position][2] = $third_word;
                    }

                }
                
            }

            //Segunda Parte
            for ($row = 0; $row < count($phrases); $row++) 
            {
                $search = $phrases[$row][1];
                $trigram["$search"][$row] = $phrases[$row][2];

                for ($col = $row+1; $col <= count($phrases) - 2; $col++) 
                {

                    if ( $phrases[$col][1] == $search ) 
                    {
                        $trigram["$search"][$col] = $phrases[$col][2];
                    }

                }
               
            }

            $this->textngrama = $trigram;

        }

        /**
         * Crea un nuevo texto con base en dos palabras, continua si el par de palabras se encuentran en el trigrama.
         */
        public function newtext (string $first_word, string $second_word) 
        {

            $search_words = $first_word." ".$second_word;

            if (!array_key_exists( $search_words, $this->textngrama)) 
            {
                throw new Exception("Las palabras: $search_words, no se encuentran en el trigrama.");
            }

            $new_text[] = $search_words;
            while (array_key_exists($search_words, $this->textngrama)) {

                $new_text_search = $this->textngrama[$search_words];
                $position = 0;
                //se guardan los valores del par de palabras, las terceras palabras.
                foreach($new_text_search as $words) {
                    $array_secondary[$position] = $words;
                    $position++;
                }

                //se seleccion de forma aleatoria la tercera palabra para la nueva frase.
                $random_word = ($position > 0) ? rand(0, $position-1) : 0;
                $new_sentence = $search_words." ".$array_secondary[$random_word];
                $text_result = explode(" ", $new_sentence);

                //se agrega la palabra al nuevo texto y definición de la nueva busqueda.
                $new_text[] = $text_result[2];
                $search_words = $text_result[1]." ".$text_result[2];

            }

            $this->textngrama = $new_text;

        }

        public function getTextngrama()
        {
            return $this->textngrama;
        }

    }

    $nGrama = new Ngrama(3, "texto-1.txt");
   
    try 
    {
        $nGrama -> conversion();
        $nGrama -> trigrama();
        $nGrama -> newtext('de', 'miel');
        $newText = implode(" ", $nGrama->getTextngrama());
        echo $newText;
    } 
    catch (Exception $error) 
    {
        echo $error -> getMessage();
    }

?>