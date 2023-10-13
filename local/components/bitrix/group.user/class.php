<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Config\Option;
use Bitrix\Main\Request;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\UserTable;
use Kidrest\Models\PersonalPropValueTable;
use Kidrest\Models\PersonalTable;
use Kidrest\Models\ScheduleTable;

Loc::loadLanguageFile(__FILE__);

class kidrestPersonalSchedule extends CBitrixComponent
{
    /**
    *   заполнение значений поумолчанию
    */
    public function onPrepareComponentParams($params)
    {
        \Bitrix\Main\Loader::includeModule('iblock');

        $this->arParams = $params;

        //сбор запроса и заполнение обязательных параметров по умолчанию, для их использования в фильтре
        $this->loadRequest();
    }

    /**
     * заполнение запроса. установка значений по умолчанию
     */
    private function loadRequest() {
        global $APPLICATION;
        $groupTable = \Bitrix\Main\GroupTable::getList([
            "select" => [
                "*"
            ],
            "order" => ["ID" => "ASC"]
        ]);
        while ($groups = $groupTable->fetch()) {
            $this->arResult["GROUP_USERS"][] = array(
                "ID" => $groups["ID"],
                "ACTIVE" => $groups["ACTIVE"],
                "C_SORT" => $groups["C_SORT"],
                "IS_SYSTEM" => $groups["IS_SYSTEM"],
                "ANONYMOUS" => $groups["ANONYMOUS"],
                "NAME" => $groups["NAME"],
                "DESCRIPTION" => $groups["DESCRIPTION"],
                "STRING_ID" => $groups["STRING_ID"],
                "DETAIL_URL" => $this->arParams["SEF_FOLDER"].$groups["ID"],
            );
        }

        return $this->arResult;
    }

    public function executeComponent()
    {
        if ($_REQUEST["ELEMENT_ID"]){
            $componentPage = "detail";
        }else{
            $componentPage = "list";
        }

        \Bitrix\Main\Loader::includeModule('iblock');

        $this->includeComponentTemplate($componentPage);
    }
}