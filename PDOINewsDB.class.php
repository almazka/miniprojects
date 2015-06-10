<?php
/* InterFace INewsDB */
interface INewsDB {
	/* добавление новой записи в новостную ленту 
	* @param string $title - заголовок новости
	* @param string $category - заголовок новости
	* @param string $description - заголовок новости
	* @param string $source - заголовок новости
	*
	*@return boolean - результат успех/ошибка 
	*/
	function saveNews($title, $category, $description, $source);
	/*
	Выборка всех записей из новостной ленты
	@return array - результат выборки в виде массива
	*/
	function getNews();
	/*
	удаление записи из новостной ленты
	@param integer $id - идентификатор удаляемой записи
	@return boolean - результат успех/ошибка
	*/
	function deleteNews($id);
}
?>