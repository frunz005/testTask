<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Config\Option;
use Bitrix\Main\Request;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\UserTable;
use Kidrest\Models\PersonalPropValueTable;
use Kidrest\Models\PersonalTable;
use Kidrest\Models\ScheduleTable;


Loc::loadLanguageFile(__FILE__);

class groupUserDetail extends CBitrixComponent
{
    /**
    *   заполнение значений поумолчанию
    */
    public function onPrepareComponentParams($params)
    {
        \Bitrix\Main\Loader::includeModule('iblock');

        //сбор запроса и заполнение обязательных параметров по умолчанию, для их использования в фильтре
        $this->loadRequest();
    }

    /**
     * заполнение запроса. установка значений по умолчанию
     */
    private function loadRequest() {
        $groupTable = \Bitrix\Main\GroupTable::getList([
            "filter" => ["=ID" => $_REQUEST["ELEMENT_ID"]],
            "select" => [
                "*"
            ],
            "order" => ["ID" => "ASC"]
        ]);
        while ($groups = $groupTable->fetch()) {
            $this->arResult = array(
                "ID" => $groups["ID"],
                "ACTIVE" => $groups["ACTIVE"],
                "C_SORT" => $groups["C_SORT"],
                "IS_SYSTEM" => $groups["IS_SYSTEM"],
                "ANONYMOUS" => $groups["ANONYMOUS"],
                "NAME" => $groups["NAME"],
                "DESCRIPTION" => $groups["DESCRIPTION"],
            );
        }

        return $this->arResult;
    }

    public function executeComponent()
    {
        \Bitrix\Main\Loader::includeModule('iblock');

        $this->includeComponentTemplate();
    }
}