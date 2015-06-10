<?php
/* Идея в том, что есть газета, к которой мы подключаем подписчиков. При обновлениях в газете им посылается уведомление об обновлении с указанием на новую статью */
class Subject implements SplSubject
{
	private $observers, $value;
	public function __construct()
	{
		$this->observers = array();
	}
	public function attach(SplObserver $observer)
	{
		$this->observers[] = $observer;
	}
	public function detach(SplObserver $observer)
	{
		if ($id = array_search($observer, $this->observers, true)) {
			unset($this->observers[$id]);
		}
	}
	public function notify()
	{
		foreach ($this->observers as $observer) {
			$observer->update($this);
		}
	}
	public function setValue($value)
	{
		$this->value = $value;
		$this->notify();
	}
	public function getValue()
	{
		return $this->value;
	}
}
class Observer implements SplObserver
{
	public function update(SplSubject $subject)
	{
		echo "<p>Появилась новая статья по имени: ".$subject->getValue()."</p>";
	}
}
$newspaper = new Subject();
$vasya = new Observer(); // подписался вася
$newspaper->attach($vasya);
$newspaper->setValue("Новая статья");
$petya = new Observer; // петя только подписался, отписаться - детач
$newspaper->attach($petya);
$newspaper->setValue('Новая статья 2');

// в итоге вася получает две статьи, а петя - одну
?>