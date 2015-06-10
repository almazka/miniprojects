<?php
/*
Идея в том, что имеется система плагинов-классов. Они стандартные - меню, список статей... Все, кто хочет создавать плагины, должны плагины имплементировать от этого интерфейса. Предположим, интерфейс лежит отдельно в др файле, а плагины - отдельно (как положено)
И разные люди их делают, могут добавлять и свои функции, но эти - закрепленные, но они могут их и не использовать
Но методы эти у себя они должны будут описывать сами.
В итоге из этих составных частей надо вывести все в одни части - меню - в один, статьи - в один...
*/
interface IPlugin
{
	//function getMenuItems();
	//function getArticles();
	//function getSidebars();	
}
/**
* Плагины на основе этого:
*/
class VasinPlugin implements IPlugin
{
	function getName()
	{
		return 'Васин плагин';
	}
	function getMenuItems()
	{
		return array('description'=>'Плагие Васи','link'=>'lol.su');
	}
	function getSidebars()
	{
		return array('one'=>'oneone','two'=>'twotwo');
	}
}
class PetinPlugin implements IPlugin
{
	function getName()
	{
		return 'Петин плагин';
	}
	function getMenuItems()
	{
		return array('description'=>'Плагие Пети','link'=>'lol.su');
	}
	function getArticles()
	{
		return array('title'=>'super post','text'=>'op op opa!','link'=>'123');
	}
}

?>