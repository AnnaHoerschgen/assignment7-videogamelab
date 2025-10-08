<?php
    function esc_html(string $text): string
    {
        return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    }

    function read_csv_rows(string $path): array
    {
        // echo($path);
        $games = array();

        if (!is_file($path)) {
            echo ("error opening stream");
            die("File not found: $path");
            return [];
        } else {
            $file = fopen($path, "r");

            while (!feof($file)) {
                $game = fgetcsv($file);

                if ($game === false) continue;

                $games[] = $game;
            }

            fclose($file);

            // print_r($games);

            return $games;
        }
    }

    function write_csv_rows(string $path, array $rows): bool
    {
        $file = fopen($path, "wb");

        if ($file === false) {
            echo ("error opening stream");
            return false;
        } else {
            // loop through the array and write each line to the CSV file
            foreach ($rows as $row) {
                fputcsv($file, $row);
            }
            // Always close the stream when finished using it
            fclose($file);
            return true;
        }
    }
?>