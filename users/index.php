<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
global $APPLICATION;
$APPLICATION->IncludeComponent(
    "bitrix:group.user",
    "",
    Array(
        "SET_TITLE" => "Y",
        "CACHE_TIME" => "360000",
        "SEF_FOLDER" => "/users/",
        "SEF_MODE" => "Y",
        "SEF_URL_TEMPLATES" => Array(
            "element"=>"#SECTION_CODE#/#ELEMENT_CODE#/",
        ),
    ),
    false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
