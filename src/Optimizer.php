<?php
/**
 * Created by PhpStorm.
 * User: Vlad Chebotarev
 * Date: 24.12.2017
 * Time: 18:56
 */

namespace Src;

class Optimizer
{

    const NUM_OF_COL = 4;               //Ilość kolumn
    private $requestString;             //Otrzymany String
    private $groupsArray = array();     //Tabela grup
    private $numberOfElements;          //Liczba elementów
    private $avgOfElements;             //Średnia liczba elementów w kolumnie  $numberOfElements/4
    private $numberOfGroup = 0;         //Liczba grup
    private $weightAvg;                 //Średnia liczba w grupie $numberOfElements/$numberOfGroup

    /**
     * @param string $requestString
     */
    public function setRequestString($requestString)
    {
        $this->requestString = $requestString;
    }

    /**
     * Konwertje String do Array
     */
    private function stringToArrayConversion()
    {
        $tmpArray = explode(" ", $this->requestString);

        sort($tmpArray);

        $this->numberOfElements = count($tmpArray);
        $this->avgOfElements = $this->numberOfElements / 4;

        $count = 1;
        for ($i = 0; $i < $this->numberOfElements; $i++) {
            if ($tmpArray[$i] != $tmpArray[$i + 1]) {
                array_push($this->groupsArray, [
                    'weight' => $count,
                    'element' => $tmpArray[$i]
                ]);
                $count = 1;
                $this->numberOfGroup++;
            } else {
                $count++;
            }
        }
        try {
            $this->weightAvg = $this->numberOfElements / $this->numberOfGroup;
        } catch (\Exception $e) {

        }
    }


    /**
     *
     */
    public function optimize()
    {
        self::stringToArrayConversion();

        $responseArray = array();

        for ($row = 0; $row < self::NUM_OF_COL; $row++) {
            $rowWeight = 0;
            $currentCol = 0;
            foreach ($this->groupsArray as $key => $value) {
                for ($col = 0; $col < $value['weight']; $col++) {
                    $responseArray[$row][$currentCol] = $value['element'];
                    $currentCol++;
                }

                $rowWeight += $value['weight'];
                unset($this->groupsArray[$key]);

                /**
                 * Sprawdzam czy waga columny jest większ bądź równa 80% od avgOfElements lub 80% weightAvg
                 */

                if ($rowWeight >= ($this->avgOfElements * 0.8) ||
                    $rowWeight >= ($this->weightAvg * 0.8)) {
                    break;
                } else {
                    $responseArray[$row][$currentCol] = ' ';
                    $rowWeight++;
                    $currentCol++;
                }
            }
        }

        $maxCol = max(count($responseArray[0]), count($responseArray[1]), count($responseArray[2]), count($responseArray[3]));

        for ($row = 0; $row < self::NUM_OF_COL; $row++) {
            for ($col = 0; $col < $maxCol; $col++) {
                if (empty($responseArray[$row][$col])) {
                    $responseArray[$row][$col] = ' ';
                }
            }
        }

        PrintArray::printArray(Transpose::transposeData($responseArray));
    }


}