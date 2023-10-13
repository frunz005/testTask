  
<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
use Bitrix\Main\Localization\Loc;


$arComponentParameters = [
    "SET_TITLE" => [],
    "INCLUDE_IBLOCK_INTO_CHAIN" => [
        "PARENT" => "ADDITIONAL_SETTINGS",
        "NAME" => GetMessage("T_IBLOCK_DESC_INCLUDE_IBLOCK_INTO_CHAIN"),
        "TYPE" => "CHECKBOX",
        "DEFAULT" => "Y",
    ],
    "CACHE_TIME"  =>  ["DEFAULT"=>36000000],
    "CACHE_FILTER" => [
        "PARENT" => "CACHE_SETTINGS",
        "NAME" => GetMessage("BN_P_CACHE_FILTER"),
        "TYPE" => "CHECKBOX",
        "DEFAULT" => "N",
    ],
    "SEF_MODE" => array(
        "element" => array(
            "NAME" => GetMessage("DETAIL_PAGE"),
            "DEFAULT" => "#SECTION_ID#/#ELEMENT_ID#/",
            "VARIABLES" => array(
                "ELEMENT_ID",
                "ELEMENT_CODE",
                "SECTION_ID",
                "SECTION_CODE",
                "SECTION_CODE_PATH",
            ),
        )
    ),
];
