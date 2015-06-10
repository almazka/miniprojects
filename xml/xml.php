Это универсальный расширяемый язык разметки
Независимый от платформы, системы и программ

В отличие от HTML XML определяет значение и отношение данных

Элементы и теги. XML состоит из элементов. Элемент состоит из открывающего, закрывающего тега и его содержимого. М.б. вложенными

Семантики в нем нет, фактически теги и их смысл мы придумываем сами, грамматики тоже нет, то бишь отношения элементов друг к другу (например титл внутри хеда).
В нем только синтаксис. 

Семантикой наделяем его сами, кто придумывает то, какие будут элементы
Например <name> - это будет имя человека, сам человек будет <person> и name должен быть вложен в person, а не наоборот - придумали мы. Это и воплощаем.

И плюс придумывается проверка на корректность
Для этого существуют правила жесткие.

<?xml version="1.0" encoding="utf-8" ?>
<!-- Пример XNL разметки -->
<pracelist>
	<book id="1">
		<title>HTML5</title>
		<author>Alex</author>
		<price currency="RUR">200</price>
		<pubDate>2012-03-23</pubDate>
	</book>
</pracelist>

Внимание! Комментарии здесь - это конструкции, они не игнорируются, как в хтмл, мы сами определяем, как их читать и воспринимать. Эта конструкция наравне со всем и надо проге указать, что с ней делать

Первая строка <?xml version="1.0" encoding="utf-8" ?> - это пролог. Атрибут версия стандартный и энкодинг. Если в документе есть символы русские, то обязательно ее указывать.

После первой строки идет корневой элемент. <pracelist> в данном случае. Он имеет откр и закр тег
Он должен быть обязательно и должен быть единственным. До него и после него никаких элементов не должно быть
Аналог в html - <html>
Если корневого элемента нет, то за него принимается любой первый элемент. После того, как он закрылся - остальное отсекается и он пишет об ошибке, что лишние данные

Название элемента не должно начинаться с цифры

Элементы должны правильно вкладываться др в др, иначе ОШИБКА, закрывающие должны четко закрываться где надо

Все регистрозависимо

Значение атрибутв должны быть обязательно в кавычках. Двойные либо одинарные, или сочетание

Атрибуты повторяющиеся не должны быть в одном теге типа <roo id="7" id="6">

Процессинговые инструкции <?  ?>
Аналог HTML - метатеги, которые учитываются перед обработкой. НО первая строка не является процессинговой инструкцией

Описание грамматики в XML, которую мы сами придумываем, осуществляется с помощью DTD или XML-схемы

Бывают пустые элементы <empty /> элемент без содержимого, как некая команда, аналог в хтмл - всякие <hr/>, <br/>

Секция CDATA
Типа экранирование. То, что внутри - не анализируется, не парсится, это текст. Всякие < будут восприниматься как текст Как одинарные кавычки в php
<description>
	<![CDATA [Какой-то <br/> текст]]>
</description>

Well-formed document
Это корректный документ, который не нарушает правил

Пространства имен XML (Name Space)
Для прописывания разного синтаксиса для элементов. Типа как два разных Васи. Пишется абстрактный идентификатор - URI
URI делится на URN (urn:schemas-microsoft-com:xml-data) и URL (http://www.w3.org/1333/XSL/Transform)
Это уникальный идентификатор ресурса
Недостаток URL в том, что адрес может меняться
Поэтому тут используется URN или URL - универсальное имя ресурса
Используется строка, похожая на URL, используется имя собственного сайта для этого

Пространство имен прописывается с помощью атрибута xmlns (xml name spaces)
<catalog xmlns = "http://megamag.ru/catalog">
	<book>
		<title>Магическая книга</title>
		<author>Иван Иванов</author>
	</book>
</catalog>
И теперь все, что вложено в этот catalog относится к пространству имен, если не указано иное пространство

По пространству имен можно делать выборку элементов

Еще пространство имен задается с помощью префикса xmlns:prefix, что удобнее, более гибко
<c:catalog xmlns:c = "http://newmagia.ru/catalog">
	<book>
		<title>Магическая магия</title>
	</book>
</c:catalog>
Более гибко потому, что вложенность не учитывается, а к пространству имен относится только то, что с префиксом, здесь book, title не относится к пространству имен
xmlns прописывается в корне
Внимание! префиксы надо прописывать и в открывающем, и в закрывающем теге!

<myBooks
	xmlns="http://igor-borisov.ru/catalog/myBooks"
	xmlns:price="http://igor-borisov.ru/catalog/pricelist"
	xmlns:staff="http://igor-borisov.ru/catalog/staff">
	<price:book>
		<price:title>XML и IE5</price:title>
		<price:author>Алекс Гомер</price:author>
		<price:price>200</price:price>
	</price:book>
	<staff:book>
		<staff:title>Dimanic HTML</staff:title>
		<staff:author>Алекс Хоумер</staff:author>
		<staff:price>120</staff:price>
	</staff:book>
</myBooks>

Внимание! Правила хорошего тона, если лезешь в чужой документ, можно все добавлять, но нужно писать это в своем пространстве имен, и в xmlns тогда пишем объясняющую ссылку на документацию, что это, где это

На основе ХМЛ сделаны FB2 и RSS, если туда новшества добавлять, то под собственным пространством имен
XHTML тоже имеет свое пространство имен

Можно использовать картинки внутри текста. Для этого используется сериализация, ее пакуют в код Base64, указав тип что это jpeg, content-type="image/jpeg"

Пространства имен бывает и для атрибутов

DTD - Document Type Definition
Язык описания структуры XML
Правила, можно ли одно пихать в другое и что там вообще должно быть
Декларация как бы
Парсер - тот, кто зачитывает документ, синтаксический анализатор.
Самый популярный парсер - DOM и SAX
DOM рассматривает документ как кучу объектов в памяти. Это узлы - ноды, которые связаны др с др.
Сам документ - тоже узел, объект, главный. Он выше корневого элемента
Описывает, какие элементы должны быть, повторения элементов, какие атрибуты д.б. у элементов - обязательные и необязательные

Структура DTD документа
<!ELEMENT pricelist (book+)>
<!ELEMENT book (title, author+, price, description?)>
<!ELEMENT title (#PCDATA)>
<!ELEMENT author (#PCDATA)>
<!ELEMENT price (#PCDATA)>
<!ELEMENT description (#PCDATA)>
<!ATTLIST price currency CDATA #IMPLIED>

Элементы можно прописывать в любой последовательности, это не важно
<!ELEMENT имя_эл (что м.б. внутри этого элемента)> так описывается элемент. Это либо др элемент, либо текстовое содержимое
+ это квантификатор о количестве от 1 до бесконечности
? это квантификатор о количестве либо 0, либо 1, не более
* это 0 или сколько угодно

| это "либо" - альтернативы элементов
<!ELEMENT description (number, (price | charrgeacct | sample))> то бишь в элементе description внутри элемент number, а потом либо price, либо charrgeacct, либо sample

#PCDATA означает текстовое содержимое

EMPTY - ключевое слово пустого элемента <!ELEMENT имя_эл EMPTY> - пустые элементы, он должен выглядеть так <имя_эл />

<!ATTLIST имя_эл имя_атр CDATA > - список атрибутов для указанного элемента
CDATA в теге ATTLIST указывает на текстовое содержимое
Внимание! Эта CDATA и секция CDATA для игнорпарсинга - разные вещи.
#IMPLIED - означает необязательность налиичия этого атрибута
#REQUIRED - означает обязательность налиичия этого атрибута

<!ENTITY> тег для сущностей. Сущности в хтмл - это например &lt; здесь их можно объявить, как константы
<!ENTITY company "Rogerr"> задали, и теперь можн в документе использовать сущность &company; на место которой будет подставляться строка заданная
Сущность может ссылаться на другую сущность и сущность в сущности
<!ENTITY first "Asya">
<!ENTITY last "Pro">
<!ENTITY company "&first; &last;">

%inline; Еще один вид сущности - параметрическая сущность, она обобщает группу по параметрам, пишется через % и объединяет параметры всего, где написано inline. Сущности эти описываются так же 
<!ENTITY % inline "#PCDATA | %fontstyle; | %phrase; | %special; | %formctrl;">

"" - служат для объединения под одной сущностью нескольких штук
Сущности могут быть сколько угодно друг в друга вложены

В описании самого HTML используется все то же самое. Например, описание тега a, его правила:
<!ELEMENT A - - (%inline;)* -(A)       -- anchor -->
<!ATTLIST A
  %attrs;                              -- %coreattrs, %i18n, %events --
  charset     %Charset;      #IMPLIED  -- char encoding of linked resource --
  type        %ContentType;  #IMPLIED  -- advisory content type --
  name        CDATA          #IMPLIED  -- named link end --
  href        %URI;          #IMPLIED  -- URI for linked resource --
  hreflang    %LanguageCode; #IMPLIED  -- language code --
  rel         %LinkTypes;    #IMPLIED  -- forward link types --
  rev         %LinkTypes;    #IMPLIED  -- reverse link types --
  accesskey   %Character;    #IMPLIED  -- accessibility key character --
  shape       %Shape;        rect      -- for use with client-side image maps --
  coords      %Coords;       #IMPLIED  -- for use with client-side image maps --
  tabindex    NUMBER         #IMPLIED  -- position in tabbing order --
  onfocus     %Script;       #IMPLIED  -- the element got the focus --
  onblur      %Script;       #IMPLIED  -- the element lost the focus --
  >

Сущности можно залавать все в отдельном файле и использовать, только нужно прописывать адрес
<!ENTITY % test SYSTEM "myentities.dtd">
Потом используем просто %test;

Таким образом, DTD определяет валидность шаблона. Корректность и так видно, если код отобразился браузером - он корректен, но валидность проверяется через DTD

Но  DTD с документом надо связать

Можно включить его прямо в структуру XML, после декларации
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE pricelist [
	<!ELEMENT pricelist (book+)>
	<!ELEMENT book (title, author+, price, description?)>
	<!ELEMENT title (#PCDATA)>
	<!ELEMENT author (#PCDATA)>
]>
После <!DOCTYPE имя_корневого [правила DTD]>
Документ самодостаточный. Валидацию можно проводить просто по нему. 

Валидацию парсер не проводит, но в DOCTYPE заглядывают за объявленными сущностями

Валидацию, например, может Notepad++ провести, или онлайн, просто документ открываем и валидируем
И пишутся всякие несоответствия

Но! Если документ огромный, то другой способ. Внешнее определение.
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE pricelist SYSTEM "mydoc.dtd">
Указание на файл dtd  SYSTEM гооврит о том, что документ локальный, если PUBLIC, то это документ из общего пользования

Можно эти два способа объединить. Основное - из стороннего файла, а некоторое - внутри документа
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE pricelist SYSTEM "mydoc.dtd"
[
<!ELEMENT sokol (#PCDATA)>
]>

Но не удобно, что в DTD отсутствуют типы данных
И здесь на помощь приходят XML схемы (XMLSchema)
DTD заточен под документ, а схемы - описание структуры всего, чего угодно, грамматики любой. Описывает:
названия элементов и атрибутов
отношения между элементами  атрибутами и их структуру
типы данных

Пример схемы
<xs:schema xmlns:xs="http://www.w3.org/2001/XMLSchema">
<xs:element name="страна" type="Страна"/>
<xs:complexType name="Страна">
    <xs:sequence>
        <xs:element name="название" type="xs:string"/>
        <xs:element name="наcеление" type="xs:decimal"/>
    </xs:sequence>
</xs:complexType>
</xs:schema>

Используются пространство имен здесь специальное xmlns:xs="http://www.w3.org/2001/XMLSchema"
Перевод - в документе будет элемент "страна" с типом "Страна". Но, т.к. префикса у объявенного типа "Страна" нет, то ниже пояснение, типа объявление этого типа, complexType - означет сложный тип, в котором несколько встроенных типов
Далее, в документе должен быть элемент под названием "Название" с типом string и элемент с названием "население" и типом decimal. Эти типы объяснять не надо, т.к. у них префикс и они объяснены там, в ссылке
У типов тоже пространство имен стоит, чтобы было понятно что такое string, decimal, в него встроенные

Данной схеме соответствует такой кусок кода xml
<страна>
	<название>Франция</название>
	<население>59.7</население>
</страна>

Принято использовать имена xs или xsd
Одна схема по идее должна описывать одно пространство имен

Сопоставить схему и документ. Фактически схема описывает пространство имен, а не сам документ. Есть 2 способа сопоставить схему и документ

Первый способ
Есть способ замороченный, с описанием схемы пространства имен
Выглядит код так:
<?xml version="1.0"?>
<xs:schema xmlns:xs="http://www.w3.org/2001/XMLSchema"
			targetNamespace="http://kokoko.ru"
			xmlns="http://tratata.com"
			xmlns:nikon="http://tinini.com"
			xmlns:xerox="http://ololo.com"
			xmlns:samsung="http://samsmu.com"
			elementFormDefault="unqualified">
targetNamespace говорит о том, к какому пространству имен принадлежит данная схема. Не к элементу схема, а к пространству имен.
У самой схемы schema прописано два своих пространства имен - xs и без префикса с адресом xmlns="http://tratata.com"
далее идут еще 3 пространства имен, но это уже относится к документу, к которому схема. То есть там, помимо пространства имен, указанного в targetNamespace могут еще использоваться ПИ :nikon, :xerox, :samsung

В документе будет так
<?xml version="1.0"?>
<my:camera xmlns:my="http://kokoko.ru"
		xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
		xsi:schemaLocation="http://kokoko.ru/schema.xsd">
schemaLocation указывает на место схемы, чтобы ее зачитать, а описание есть по адресу в xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance", т.е. описание атрибута schemaLocation
То бишь префикс xsi нужен для того, чтобы наделить семантикой schemaLocation

Когда браузер видит совпадение адреса в targetNamespace с адресом в документе в объявлении ПИ, он связывает схему с документом

Способ второй - привязка без указанного пространства имен
<?xml version="1.0"?>
<root
	xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	xsi:noNamespaceschemaLocation="myschema.xsd">
<name>Vasya Pupkun</name>
<myAge>24</myAge>
</root>

xsi - промежуточная вещь
В данном случае то же самое - префикс xsi нужен для того, чтобы наделить семантикой noNamespaceschemaLocation и он указывает на документ, где эта схема
Это две магические строки, которые надо использовать друг за другом
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xsi:noNamespaceschemaLocation="myschema.xsd">

Валидацию по схеме проводить точно так же, как валидацию по DTD, в Notepad++ есть, либо в онлайне
Есть сайт "http://www.utilities-online.info/xsdvalidation/" - там валидация и схемы, и xml файла, и их связи

Строение схемы
Схема сама по себе - тоже документ xml, поэтому она имеет тоже пролог, первую строку и корневой элемент по имени schema. И эти все названия придуманы там "http://www.w3.org/2001/XMLSchema", поэтому прописываем пространство имен

<?xml version="1.0" encoding="utf-8"?>
<xs:schema xmlns:xs="http://www.w3.org/2001/XMLSchema">
	<xs:element name="root">
		<xs:complexType>
		    <xs:sequence>
		    	<test></test>
		        <xs:element name="name" type="xs:string"/>
		        <xs:element name="myAge" type="xs:integer"/>
		        <xs:element name="url" type="xs:string"/>
		    </xs:sequence>
		</xs:complexType>
	</xs:element>
</xs:schema>
"http://www.w3.org/2001/XMLSchema" - адрес не от балды, там правда все описано.
В этом случае, если мы добавляем какой-то свой элемент, то пишем его голым, без префикса xs, потому что он в то пространство не входит
test элемент, предположим, мой

Составные схемы:
Элемент
<xs:element name="name" type="xs:string"/>
из этого появится элемент <name>содержимое текстовое</name>

Документэйшн
<xs:annotation>
	<xs:documentation>
		Бла
	</xs:documentation>
</xs:>
documentation это типа комментария, пишется оязательно вложенным тегом в annotation

Типы данных в схемах - это самое основное. Бывают простые и сложные:
simpleType - простые типа скалярный, в них ничего не вложить и у них нет атрибутов никаких

XMLSchema не отменяет использование DTD. DTD можно использовать для задания сущностей.

Есть большой набор предопределенных типов данных с иерархией
Они подразделяются на группы типов данных. Внутри групп типы данных друг у друга наследуют. Есть схема, где наглядно видно, кто у кого наследует. Она на www.w3.org/TR/xmlschema-2/
Группы:
1. числовые
2. строковые
3. связанные с датой и временем
4. те, которые не вошли никуда

Но все это только декларация, отдельно свойства некоторых типов требуется описывать, иначе пофиг

Группа строковых
Тип string

Тип normalizedString - наследует от string. Это строка без учета перевода строк (\n), возврата каретки (\t) и табуляции

Тип token наследует от normalizedString, то бишь это уже нормализованная строка (минус всякие табуляци) плюс усеченные с краев пробелы, а в середине пробелы усекаются до одного.

Тип language. Наследует от token. Там типа язык ru или ru-ru, en-en.

Тип Name - тоже наследует от token. Не может начинаться с цифры

Тип NCName - наследует от Name. То же, что нейм, только нельзя двоеточия

ID наследуется от NCName должен быть уникальный и не начинаться с цифры.

IDREF наследуется от NCName тоже. Это типа ссылка на id, который есть уже в документе. Например
<title id="t1" />
<title id="t2" />
<title id="t3" />
<author id="a1" /> 
<publisher from="t1"> значение атрибута ссылается на существующий id
Поэтому в DTD описании задаем publisher тип атрибута from IDREF
<!ATTLIST title id ID #REQUIRED>
<!ATTLIST author id ID #REQUIRED>
<!ATTLIST publisher from IDREF #REQUIRED>

IDREFS то же, что IDREF, только мы можем ссылаться на несколько употребленных id

Группа времени
Тип dateTime. Такого вида <x>2013-06-11T18:40:45</x> Должен описываться от большего к меньшему. Сначала 4 цифры года, потом через дефис 2 цифры месяца, потом через дефис 2 цифры числа, потом без пробела буква T - значит время, потом часы, двоеточие, минуты, двоеточие, секунды, через тчк еще можно дописать милисек

Тип date - это только дата, по тому же правилу

Тип time - только время, без буквы T, по тем же правилам

Тип gYearMonth - сугубо год и месяц, те же правила, сначала год и через дефис месяц

Тип gYear - год

Тип gMonthDay - <x>--06-11</x>

Тип gDay - <x>---11</x>

Тип duration - тоже временная, но особняком. Относительный интерват (от или до какого-то события). <x>P5Y3M21DT4H32M12S</x> Сначала буква P (период), потом количество лет и/или месяцев и/или дней, потом T (время) и количество часов, минут, секунд в таком же формате - число и буква.

Группа числовых

Тип decimal стоит в основе иерархии как некое абстрактное вещественное число
Типы float и double - числа с плавающей точкой
Тип integer - это decimal с нулевым порядком 25.0
Тип long
Тип int
Тип short
Тип byte однобайтовое число (до 127 например)
Тип negativeInteger только отрицательные числа, 0 не входит
Тип positiveInteger только положительные числа, 0 не входит
Тип nonNegativeInteger включает позитивные и 0
Тип nonPositiveInteger негативные и 0

Группа вспомогательных типов

boolean - тру фолс
hexBinary - что-то в шестнадцатеричном формате, цифры от 0 до 9 по 2 числа и буквы от а до зет
anyURI - все, что подходит под стандарт uri - "http://site.ru/lol.ty"
QName что-то с двоеточием и продолжением "xxx:uu" имя namespace можно использовать
NDATA как ссылка, говорит о том, что этот элемент не содержит xml, а нечто стороннее, что объявлено где-то в DTD
<NOTATION type="image/png"> указывается тип этого нечто
<!ELEMENT image NDATA>

Из простых типов компануются сложные
complexType
Cложные типы данных. Внутри них может содержаться в тегах <xs:complexType> другие типы. Сложные типы бывают поименованные и безымянные. Содержат в себе несколько типов
По аналогии с поименованными и безымянными функциями в js

<?xml version="1.0" encoding="utf-8"?>
<xs:schema xmlns:xs="http://www.w3.org/2001/XMLSchema">
	<xs:complexType name="myRoot">
			<xs:sequence>
				<xs:element name="name" type="xs:string"/>
				<xs:element name="myAge" type="xs:integer"/>
			    <xs:element name="url" type="xs:anyURI"/>
	    	</xs:sequence>
		</xs:complexType>
	<xs:element name="root" type="myRoot" />
</xs:schema>

Мы не объявляем type у элемента в данном случае, сразу после этого пишем, что это комплекстайп
sequence - это композитор, секвенция, то бишь порядок расположения элементов. Типа внутри элемента находится секвенция следующих элементов - и перечисляются эл-ты
Описывать комплексные типы удобнее в самом верху, тогда элемент элемент уже короче, он закрытый

Композиторы
Для того, чтобы указать, как в комплексном типе ведут себя внутренности, их взаимотношений
sequence - наиболее частый и гибкий. 
<?xml version="1.0" encoding="utf-8"?>
<xs:schema xmlns:xs="http://www.w3.org/2001/XMLSchema">
	<xs:complexType name="myRoot">
			<xs:sequence>
				<xs:element name="name" type="xs:string"/>
				<xs:element name="myAge" type="xs:integer"/>
			    <xs:element name="url" type="xs:anyURI"/>
	    	</xs:sequence>
		</xs:complexType>
	<xs:element name="root" type="myRoot" />
</xs:schema>
Последовательно читать - все понятно. Есть комплексный тип у элемента root. Он состоит из последовательности трех элементов. Жестки порядок следования - в описанном порядке только - name, myAge и url и все они обязаны быть
Тут прокатит только так:
<?xml version="1.0"?>
<root
	xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	xsi:noNamespaceschemaLocation="myschema.xsd">
<name>Vasya Pupkun</name>
<myAge>24</myAge>
<url>lol.ru</url>
</root>

choice - типа или, один из. В документе могут быть использованы не все описанные элементы, а только один из них
<xs:choice name="myRoot">
	<xs:element name="name" type="xs:string"/>
	<xs:element name="myAge" type="xs:integer"/>
    <xs:element name="url" type="xs:string"/>
</xs:choice>
Тут прокатит только c одним элементом, с всеми тремя не прокатит:
<?xml version="1.0"?>
<root
	xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	xsi:noNamespaceschemaLocation="myschema.xsd">
<name>Vasya Pupkun</name>
</root>

all - все что есть, в любой последовательности, но обязательно чтобы все элементы заявленные были
Схеме
<xs:all name="myRoot">
	<xs:element name="name" type="xs:string"/>
	<xs:element name="myAge" type="xs:integer"/>
    <xs:element name="url" type="xs:string"/>
</xs:all>
Нормально прокатит любая последовательность, главное, чтобы все вместе были элементы:
<?xml version="1.0"?>
<root
	xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	xsi:noNamespaceschemaLocation="myschema.xsd">
<myAge>24</myAge>
<name>Vasya Pupkun</name>
<url>lol.ru</url>
</root>

Атрибуты minOccurs, maxOccurs
minOccurs - минимальное количество
maxOccurs - максимальное количество
<xs:element name="person" type="personType" minOccurs="0" maxOccurs="unbounded" /> от 0 до бесконечности можно плодить этих <person></person>

unbounded - не ограничено
Если проводить аналогию с DTD, то
? - Это:
minOccurs="0"
maxOccurs="1"
* - Это:
minOccurs="0"
maxOccurs="unbounded"
+ - Это:
minOccurs="1"
maxOccurs="unbounded"

Но атрибутом писать гибче, т.к. можно любое число задать

Элемент any
Означает, что любой элемент в это место добавить можно, главное, что он описан где-нибудь ниже, например

<xs:complexType name="lolType">
	<xs:sequence>
		<xs:element name="name" type="xs:string" />
		<xs:element name="biologyAge" type="xs:integer" />
		<xs:element name="url" type="xs:anyURI" />
		<xs:element any minOccurs="0" />
	</xs:sequence>
</xs:complexType>
<xs:element name="age" type="xs:integer" />
<xs:element name="personal" type="lolType" />

В итоге спокойно пройдет такое:
<personal>
	<name>Vasya</name>
	<biologyAge>24</biologyAge>
	<url>Vasya.ru</url>
	<age>44</age>
</personal>

Атрибуты для сложных типов
Добавление атрибута для комплексного элемента. Тип атрибута, обязательный он или нет, его имя. Выносится их описание вниз, в тег <xs:attribute>, перед закрывающим тегом complexType
<xs:element name="ello">
<xs:complexType>
	<xs:sequence>
		<xs:element name="name" type="xs:string" />
		<xs:element name="biologyAge" type="xs:integer" />
		<xs:element name="url" type="xs:anyURI" />
		<xs:element any minOccurs="0" />
	</xs:sequence>
<xs:attribute name="id" type="xs:ID" use="required" default="E4" />
</xs:complexType>
</xs:element>

use - говорит об обязательности присутствия атрибута. Значение required - обязательно, optional - не обязательно
default - указывается значение по умолчанию

в итоге будет 
<ello id="U5"> элемент с обязательным атрибутом id с типом данных ID

Атрибуты для простых типов
Для добавления атрибутов, простой тип надо превращать в сложный, добавляя вместо композитора <xs:simpleContent>, а тип этого элемента выносим в тег 
Было - <xs:element name="biologyAge" type="xs:integer" />
Стало - 
<xs:element name="biologyAge">
	<xs:complexType>
		<xs:simpleContent>
			<xs:extension base="xs:integer">
				<xs:attribute name="id" type="xs:ID" use="required" />
			</xs:extension>
		</xs:simpleContent>
	</xs:complexType>
</xs:element>
Теперь элемент заимеет атрибут:
<biologyAge id="U5">34</biologyAge>

Группы элементов
За это отвечает тег (элемент) group
Аналог include

<xs:group name="acct">
	<xs:sequence>
		<xs:element name="name" type="xs:string" />
		<xs:element name="biologyAge" type="xs:integer" />
		<xs:element name="url" type="xs:anyURI" />
		<xs:element any minOccurs="0" />
	</xs:sequence>
</xs:group>

В группе тоже используется композитор с теми же правилами
К описанной группе ссылаемся через атрибут ref с указанием имени группы
<xs:complexType name="checkingAcct">
	<xs:sequence>
		<xs:group ref="acct">
	</xs:sequence>
<xs:attribute name="id" type="xs:ID" use="required" />
</xs:complexType>

Можно выгодно группировать элементы в повторяющихся или частично повторяющихся кусках кода. Например, два почти одинаковых элемента. Одинаковую часть группируем, а в различии просто добавляем отличный элемент
Дано:
<customers>
	<customer>
		<id>A-1</id>
		<name>Вася</name>
		<addr>Адрес</addr>
	</customer>
	<customer>
		<id>A-2</id>
		<name>Петя</name>
		<addr>Адрес</addr>
	</customer>	
</customers>

<clerks>
	<clerk>
		<id>B-1</id>
		<name>Саша</name>
		<office>Адрес</office>
	</clerk>
	<clerk>
		<id>B-2</id>
		<name>Сережа</name>
		<office>Адрес</office>
	</clerk>	
</clerks>

Почти одинаковые customer и clerk сливаем в группу
<xs:group name="personGroup">
	<xs:sequence>
		<xs:element name="id" type="xs:ID" />
		<xs:element name="name" type="xs:string" />
	</xs:sequence>
</xs:group>

В итоге описания их:
<xs:element name="customer">
	<xs:complexType>
		<xs:sequence>
			<xs:group ref="personGroup" />
			<xs:element name="addr" type="xs:string" />
		</xs:sequence>
	</xs:complexType>
</xs:element>

<xs:element name="clerk">
	<xs:complexType>
		<xs:sequence>
			<xs:group ref="personGroup" />
			<xs:element name="office" type="xs:string" />
		</xs:sequence>
	</xs:complexType>
</xs:element>

Внимание! Композитор группы должен совпадать с композитором типа!

Расширение сложных типов
Это типа наследование. То бишь создается новый тип, который наследует какой-либо выбранный и плюс добавляются новые элементы. Но у начальному они не добавляются, а начальный берется как основа

Напомним, простой тип мы расширяли посредством simpleContent
Сложные типы расширяются по такому же принципу, только через complexContent вместо секвенции и extension
Это делается с поименованными complexType-ми
Дано:
<xs:complexType name="acct">
	<xs:sequence>
		<xs:group ref="personGroup" />
		<xs:element name="office" type="xs:string" />
	</xs:sequence>
</xs:complexType>
Расширение внесение:
<xs:complexType name="savingAcct">
	<xs:complexContent>
		<xs:extension base="acct">
			<xs:sequence>
				<xs:element name="trololosay" type="xs:string" />
			</xs:sequence>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
В итоге появляется новый тип savingAcct, который содержит в себе элементы типа acct и дополнительный элемент trololosay

Расширение простых типов
Для этого используется элемент (тег) restriction внутри  simpleType. Создаем свое имя типа и описываем его отдельно
Например, к такой записи:
<customer>
	<id>A-5</id>
	<name>Петр</name>
	<age>34</age>
	<birthday>1988-12-06</birthday>
	<phone>787-09-56</phone>
	<day>Понедельник</day>
</customer>
Схема
<xs:simpleType name="ageType">
	<xs:restriction base="xs:integer">
		<xs:maxInclusive value="100" />
		<xs:minExclusive value="10" />
	</xs:restriction>
</xs:simpleType>

<xs:element name="customer">
	<xs:complexType>
		<xs:sequence>
			<xs:element name="id" type="xs:ID" />
			<xs:element name="name" type="xs:string" />
			<xs:element name="age" type="ageType" />
			<xs:element name="birthday" type="xs:date" />
			<xs:element name="phone" type="phoneType" />
			<xs:element name="day" type="daysType" />
		</xs:sequence>
	</xs:complexType>
</xs:element>

Расширения - фасеты
<xs:maxInclusive value="100" /> Максимальное значение <=100 включительно
<xs:minInclusive value="10" /> Минимальное значение >=100 включительно
<xs:maxExclusive value="100" /> Минимальное значение <10 
<xs:minExclusive value="10" /> Минимальное значение >10 
<xs:totalDigits value="4" /> Общее количество цифр
<xs:pattern value="\d{3}-?\d{2}-?\d{2}" />  Регулярное выражение
<xs:restriction base="xs:string">
	<xs:enumeration value="Понедельник" /> устанавливаем значение в пределах введенных
	<xs:enumeration value="Вторник" />
	<xs:enumeration value="Среда" />
</xs:restriction>
<xs:length="4" /> устанавливаем длину
<xs:minLength="2" /> минимальная длина
<xs:maxLength="2" /> максимальная длина

Есть программы для написания схем. Но они все платные. Но, наверное, есть крякнутые. Самые известные - Liquid XML Studio, Altova XML Spy 

Язык XPATH - это язык выборки, указания на конкретные узлы. Он универсальный, используется не только в xsl
Для работы с ним удобно использовать Notepad++ плагин XPatherizer

По синтаксису XPath выражения напоминают пути к файлам, только это перемещение по узлам (нодам) файла

Относительный путь
<xsl:template match="job/title">

Абсолютный путь - начинается со слэша, типа начиная с самого документа (даже не с корня)
<xsl:template match="/emploee/job/title">
в данном примере корнем будет emploee

Поиск элементов на любой глубине - двойной слэш
<xsl:template match="emploee/job//title">

Использование * - выбрать все элементы по указанному адресу
<xsl:template match="emploee/job/*">

Длинные пути можно не составлять вручную, а можно в  Notepad++ плагин XPatherizer, в тексте документа выделить нужные теги и ctrl+shift+alt+b сформирует путь и запишет его в буфере обмена, остается только вставить

Дерево документа
Внимание! Пространство имен считается ребенком корня! 
Также ребенками элементов считаются как их внутренние ноды (узлы), так и атрибуты, и пространство имен наследованое тоже

Путь - это ось выборки (axes). Оси имеют свои названия

Ось self возвращает сам элемент
Ось child возвращает детей элемента без их детей
parent - родитель
attribute - атрибуты
descendant - все дети и их дети, и тех дети все до упора
descendant-of-self все дети self-а и их дети, и тех дети все до упора
ancestor родитель и его предки все до упора
ancestor-of-self родитель self-а и его предки все до упора
following - соседские все элементы со своими детьми, которые справа по дереву, типа после него
following-sibling - только соседи, без своих детей - справа
preceding - тот же following, только слева
preceding-sibling - аналогично, только соседи, без своих детей - слева

Использование осей
Через двойное двоеточие
child::price, есть сокращенный вариант - просто price
Запись /emploee/job/title - это сокращенное от /emploee/job/child::title

Атрибуты
/emploee/job/book/attribute::id - выборка атрибута id у элемента book в элементе job элемента emploee
/emploee/job/book/@id - сокращенная запись, вернуть атрибут id

self::node() - вернуть самого себя, функция нода возвращает текущую ноду
.  - сокращенная запись того же

parent::node()
.. - сокращенная запись того же

descendant-of-self - сокращенная "//"

Некоторые оси не имеют сокращения, тогда пишем их через :: - 
ancestor::node()

Выборка узла по имени
Из вышесказанного следует - если просто пишем название - то имеем в виду элемент
Если @название - то атрибут
price - выбрать элемент по имени price
@price - выбрать атрибут по имени price
* - выбрать все узлы
@* - выбрать все атрибуты
app:price - выбрать price из пространства имен app
@app:price - выбрать все атрибуты price из пространства имен app
app:* - выбрать все элементы из пространства имен app
@app:* - выбрать все атрибуты из пространства имен app

Выборка узлов по типу
text() - возвращает текстовый узел
node() - возвращает ноду, сам узел
processing-instruction() - возвращает процессинговую инструкцию, это, например, заданный файл <?xml-stylesheet type="text/xsl" href="xpath.xsl" ?> выдаст начиная со слова type
comment() - возвр комментарий

Предикаты
Позволяют выбрать не все узлы, а только определенные
Пишутся в []
Отсчет идет с одного, а не с нуля
/price/book[3] возвращает третью по счету <book>
/price/book[last()] возвращает последнюю <book>
/biblio/book/price[.>150] раскрывает прайс, сравнивает значение его самого с указанным 150, выдает <price>, значение которых больше 150
/biblio/book/price[.>150]/../title сделать выборку по 150, потом у выбранных поднимаемся к родителю и выдаем его <title>
/biblio/book[price>150]/title - можно писать так, краткая запись
/biblio/book[@id] выбрать все <book>, у которых есть атрибут id
/price/book[@id=5] выбрать все <book>, у которых атрибут id=5
/price/book[@id][2] выбрать все <book>, у которых есть атрибут id и после этого вернуть <book> номер 2

Логческие операторы XPath
A and B
A or B

Арифметические операторы XPath
A + B
A - B
A * B
A div B - деление
A mod B 
-A
Эти все операторы могут использоваться в []

Операторы сравнений
=
!=
<
>
<=
>=
Внимание! Если пишем XPath строку в документе xml, то угловые скобки надо заменять на сущности

Функции в XPath есть под 4 типа - под булев, под строки, под числа и узлы
Булевские функции 
boolean(object) - приведение к булеву типу
not(boolean)
true() возвращает true для сравнения с true
false() для сравнения с false

Числовые функции
number(object) - приведение к числу, или к NaN
sum(node-set) - что угодно в него можно пихать, возвращает общее
sum(/biblio/book/price) вернет общую сумму содержимого <price>
floor(number) - округление к низу floor(3,5) вернет 3
ceiling(number) - округление к верху ceiling(3,5) вернет 4
round(number) - округление человеческое, до 5 - к низу, после - к верху

Строковые функции
string(object) - приведение к строке

concat(string, string, string*) - конкатенация, склеивание строки

starts-with(string, string) - передаем строку и искомый кусок. Вернет то, что начинается с указанного куска
/biblio/book/title[starts-with(.,"so")] возвращает <title>, которые начинаются на so

contains(string, string) -  Вернет то, что содержит указанный кусок

substring-before(string, string) - первым передается строка вся, вторым кусок. Вернется то, что перед этим куском
substring-before("Мама мыла раму", "раму") вернет "Мама мыла"

substring-after(string, string) - вернет то, что после куска

substring(string, number, number?) - передаем строку, позицию начала, позицию конца (ее может не быть - тогда автоматом до конца строки), возвращает кусок строки.
Внимание! Позиция не с 0 считается, а с 1

string-length(string?) - длина строки

normalize-space(string?) - обрезает слева-справа, пробелы внутри приводит к одному

translate(string, string, string) - передаем строку начала преобразований, второе - кусок для изменения и третие - то, на что заменить
translate("абвлфо", "абф", "АБФ") вернет АБвлФо

Функции множеств узлов
last() - возвращает последний по счету узел

position() - возвращает текущую позицию по счету узла
/biblio/book/[position() mod 2 = 0] вернет все четные
/biblio/book/[position() mod 2 != 0] вернет все нечетные

count(node-set) - передаем набор узлов, подсчитывает их количество
count(/biblio/book) вернет количество <book>

local-name(node-set?) - возвращает имя с пространством имен x:title

namespace-uri(node-set?) - возвращает ярлык пространства имен x:title вернет x

name(node-set?) - возвращает имя без пространства имен x:title вернет title

XSL 
Шаблонизатор. Это язык, созданный на основе xml
У него есть свое пространство имен 'http://www.w3.org/1999/XSL/Transform', все инструкции описаны там
В XSL документе можно использовать любые пространства имен

XSL документ имеет свой корень, пролог xml:
<?xml version="1.0" encoding="utf-8" ?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	...
</xsl:stylesheet>
Принято называть пространство имен здесь xsl

В XSL все крутится вокруг шаблонного правила
<xsl:template match="book">
	тело шаблона
</xsl:template>

За это отвечает элемент (тег) <xsl:template>

Шаблоны бывают на совпадение и поименованные

На совпадение:
Шаблон работает с тем, что совпало
Атрибуты:
match - к какому узлу применяется шаблон, то бишь match="book" заменить все <book> на то, что в шаблоне
<xsl:template match="book">
	книга
</xsl:template> Заменит все теги <book> с их содержимым на строку "книга"

В match можно использовать всякие * и т.д.

Правила по умолчанию при применении шаблона:
Если применение шаблона закончилось и в документе остались необработанные элементы, то
- если это текстовый узел, то просто его вытащить и голым оставить - копировать на выход
- если это элемент, то, если под него шаблона нет, проходим по его детям
Выход из этого - сначала матчить корень <xsl:template match="/"> а потом все остальное

Внутри <xsl:template>
Вывод значения
Используются тег (элемент) <xsl:value-of select="" />
Это аналог echo
<xsl:template match="book">
	<xsl:value-of select="title" />
</xsl:template>
Берет title у book-а, в который он в данный момент зашел. В итоге он заменит все буки на их тайтлы

XSL трансформации можно просматривать в Notepad++ в плагинах, указав файл xsl, преобразованный результат появится в новом документе
Находиться надо на документе xml, зайти в плагин xml -> xsl трансформация и выбрать xsl

Еще в xsl используется язык XPATH

Поименованный шаблон имеет атрибут name
может иметь и match, mode, priority
<xsl:template 
	name="name"
	match="pattern"
	mode="mode"
	priority="number">
	<xsl:param />
</xsl:template>

Если шаблонов с одинаковым паттерном несколько, то применится тот, который описывает совпадение наилучшим образом
Например, если там указана более точная выборка
<xsl:template 
	match="/price/list/book">
	Книга
</xsl:template>
<xsl:template 
	match="/price/list/book[price = 200]">
	Книга более конкретно
</xsl:template>
Будет выбран второй шаблон, а первый будет применен к тем <book>, где <price> не 200

Если шаблоны с совсем одинаковым паттерном - будет исполнен ПОСЛЕДНИЙ
Т.к. он сперва все зачитывает до чтения, шаблоны в кучку последовательно кладет и перегружает

Атрибут priority для того, чтобы не перегружал, можно сознательно задать порядок исполнения шаблонов, даже если они одинаковые

Атрибут mode почти как priority, только в виде строки, за него можно зацепиться как за ключевое слово шаблона

Засады WHITESPACE
Внимание! Есть такая засада, когда за детей принимается табуляция
Например, здесь
<div>
	<p>One</p>
	<p>T
	<b>w</b>o
	</p>
	<p>Three</p>
</div>
Будет 7 детей у дива
А здесь:
<div><p>One</p><p>T<b>w</b>o</p><p>Three</p></div>
три ребенка
Кол-во детей можно узнать через код
console.log(document.getElementsByTagName('div')[0].childNodes.length);
По умолчанию whitespace в браузерах стоит true и интерпретируется все так, с учетом табуляции как детей
Поэтому надо xml документы сжимать в одну строку. Это делается в Notepad++ в плагине XMLTools -> linalize XML
А обратное действие с любого вида документом, построить его из одной строки в норм вид - ctrl+shift+alt+p

Еще зазада вайтспейсов - это отсутствие пробелов при трансформации xml по xsl
Между тегами, заданными шаблоном пробелы не будут ставиться

<xsl:template match="book">
	Заголовок: 
	<xsl:value-of select="title" />
	<xsl:value-of select="name" />
</xsl:template>	
В результате получим title и name, не разделенные пробелами
Для решания этой ситуации есть специальный код пробела для xml, его удобно задать в DTD у xsl
<!DOCTYPE xsl:stylesheet
[
<!ENTITY nbsp (&#160;)>
]>
А в коде прописать:
<xsl:template match="book">
	Заголовок: 
	<xsl:value-of select="title" />&nbsp;
	<xsl:value-of select="name" />
</xsl:template>	

НО! Удобнее для этого создавать текстовые узлы <xsl:text> (см ниже)

Тег <xsl:apply-templates>
Помогает справиться с правилом шаблона, когда он все подряд вываливает
<xsl:apply-templates
select="expression"
mode="name">
...
</xsl:apply-templates>

Дословно действие этого apply-templates означает - остановиться и применить другие шаблоны, указанные или просто другие, которые ниже по документу, в этом случае тег закрытый <xsl:apply-templates />

И желетально его размещать сразу в корне
<xsl:template match="/">
	<html>
		<body>
			<xsl:apply-templates />
		</body>
	</html>
</xsl:template>

При большом документе используется с  select-ом
<xsl:apply-templates select="/pricelist/book" /> остановиться, выбрать все <book>, и потом искать ниже шаблоны для <book> и применить их
Потом он возвращается к первонаяальному месту apply-templates и заканчивает его
По аналогии с функциями работает, когда функции внутри функций

Именованные шаблоны
Задаем
<xsl:template name="tmpName">
	...
</xsl:template>

Вызываем
<xsl:call-template name="tmpName">
...
</xsl:call-template>

или закрытыми тегами <xsl:call-template name="tmpName" />

Создание узлов-элементов

Но при создании xml из xml теги обычно захардкожены. Чтобы внести динамику (например, живая нумерация), можно использовать динамическое создание узлов-элементов

<xsl:element name="name" namespace="URI" use-attribute-sets="имя группы атрибутов">
...
</xsl:element>

Атрибуты можно делать динамическими с помощью экранирования
Экранирование нужно там, где ожидается строка,  например, в name
<xsl:element name="item-{position()}"> результат - <item-1></item-1><item-2></item-2>...

Добваление атрибута в динамический element
В него вставляем тег <xsl:attribute>

<xsl:attribute name="имя"><xsl:value-of select="Значение" /></xsl:attribute> 
Внимание! ВАЖНО ПОМНИТЬ, В КАКОМ МЫ КОНТЕКСТЕ НАХОДИМСЯ. Просто значение от балды задать не прокатит, в select="Значение" должно идти значение, которое доступно в контексте
Внимание! <xsl:attribute> должен идти ДО содержимого value-of

use-attribute-sets у тега <xsl:element> показывает возможность задать несколько атрибутов элементу.
Если несколько групп атрибутов, то через пробел имена этих групп <xsl:element name="name" use-attribute-sets="gro1 gro2">


Для задания нескольких атрибутов - тег <xsl:attribute-set>

Это как бы группа атрибутов, создается она в любом месте

<xsl:attribute-set name="x">
	<xsl:attribute name="a">lola</xsl:attribute>
	<xsl:attribute name="b">lolb</xsl:attribute>
	<xsl:attribute name="c">lolc</xsl:attribute>
</xsl:attribute-set>

Создание текстовых узлов

Для этого используется спец тег <xsl:text>

<xsl:text disable-output-escaping="yes|no">
	...
</xsl:text>

Его можно не использовать, если у нас просто текст, он его отфильтрует как текст, но если надо намеренно указать, что это текст, например, пробел добавить - то пригодится
<xsl:text> </xsl:text>
Внимание! Если пробел неразрывный, или надо использовать другие спец символы, то ставим атрибут disable-output-escaping="yes", чтобы он не заменял
и используем CDATA
<xsl:text disable-output-escaping="yes"><![CDATA[&nbsp;]]></xsl:text>

Чтобы в xml файле нормально воспринимались всчкие такие &nbsp; и т.д., нужно подключить после строки <?xml version="1.0"?> декларацию 
<!DOCTYPE html PUBLIC "-//W3C//DTD/ XHTML 1.0 Strict//EN" "http://www.w3org/TR/xhtml1/DTD/xhtml1-strict.dtd">
Ниже, сразу после декларации можно использовать DTD и добавлять всякие сущности
и между тегами xml спокойно писать эти символы, ошибки не будет

Создание узла комментария

За это отвечает тег <xsl:comment>

<xsl:comment>
	текст коммента
</xsl:comment>
Результат будет таким - <!-- текст коммента -->

Динамику куда угодно можно добавить с помощью <xsl:value-of>

<xsl:comment>
	комент номер <xsl:value-of select="position()">
</xsl:comment>

Создание процессинговой инструкции
Процессинговая инструкция - это типа <? xml ... ?>
Используется спец тег <xsl:processing-instruction>

<xsl:processing-instruction name="process-name">
	...
</xsl:processing-instruction>

Копирование узлов
Используется тег <xsl:copy-of> Он копирует все на выход

<xsl:template match="a">
	<xsl:copy-of select="." />
</xsl:template>
Копирует все <a> целиком, со всеми атрибутами и т.д.

Если надо копировать не все с атрибутами, а выборочно - тег <xsl:copy>

<xsl:template match="a">
	<xsl:copy>
		<xsl:value-of select="." />
	</xsl:copy>
</xsl:template>
Вернет только теги a с текстом внутри, без всяких атрибутов

Для выборки атрибута используем <xsl:attribute> внутри <xsl:copy>

<xsl:template match="a">
	<xsl:copy>
		<xsl:attribute name="href">
		<xsl:value-of select="@href" />
		</xsl:attribute>
		<xsl:value-of select="." />
	</xsl:copy>
</xsl:template>
Копирует тег а с содержимым и атрибутом хреф
По аналогии можно с группой атрибутов - 
use-attribute-sets="имя группы атрибутов"

Условная обработка
С помощью тега <xsl:if>

<xsl:if test="exrpession">
	...
</xsl:if>

В атрибуте test должно быть тру, там любое xpath, сравнение и т.д.

<xsl:template match="item">
	<li>
		<xsl:value-of select="@name" />
		<xsl:if test="@onstore = 'yes'">
			На складе
		</xsl:if> 
	</li>
</xsl:template>

Оператор выбора <xsl:choose> - как оболочка цикла, <xsl:when> - условия и действия, <xsl:otherwise> - аналог else

<xsl:choose>
	<xsl:when test="boolean-expression">
		...
	</xsl:when>
	<xsl:when test="boolean-expression">
		...
	</xsl:when>
	<xsl:otherwise>
		...
	</xsl:otherwise>
</xsl:choose>

Циклическая обработка. Используется тег <xsl:for-each>

<xsl:for-each select="expression">
	...
</xsl:for-each>

<xsl:template match="book">
	<li>
		<xsl:for-each select="*">
			<xsl:value-of select="name()" />
			<xsl:text>: </xsl:text>
			<xsl:value-of select="." />
			<br />
		</xsl:for-each>
	</li>
</xsl:template>


Сортировка значений. С помощью тега <xsl:sort>
<xsl:template match="/">
	<html>
		<body>
			<ul>
				<xsl:apply-templates select="/pricelist/book">
				<xsl:sort select="author" />
				</xsl:apply-templates>
			</ul>
		</body>
	</html>
</xsl:template>
Сначала выполняется другой шаблон, а потом результат сортируется по алфавиту по автору. Можно так по чему угодно отсортировать
Внимание! По-умолчанию сортировка по алфавиту. Если надо по цифрам, то воспользуемся атрибутом data-type

<xsl:sort select="author" data-type="number"/>

Другие атрибуты тега - 
lang="language-code"
order="ascending|descending" - порядок
case-order="upper-first|lower-first" - какие данные первыми - с большой буквы или с маленькой

Использование пространств имен в XSLT
Перед использованием пространств имен, их надо определить. Оперделяются все вместе вверху. В документе xsl, в xml оно тоже указано, прямо в теге

<?xml:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/Transform"
xmlns:fb2="http://www.fulibu.ru/biu"
xmlns:lab="http://www.mysite.ru/tab"
?>

И тогда при написании на XPath указывать повсюду имя пространства имен, например
/fb2:functionBook/fb2:description/fb2title-info/fb2:author

Если в xsl прописано пространство имен и нам надо выдернуть элементы из этого пространства, то при трансформации по xsl пространство имен само пропишется в выходном теге, или в теге, объединяющем выходные теги из этого неймспейса
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://lol.ru"
	xmlns:x="http://ooo.lo">
<xsl:template match="book">
	<div>
		<p>
			<xsl:value-of select="/x:pricelist/x:book">
		</p>
		<p>
			<xsl:value-of select="/x:pricelist/x:book2">
		</p>
	</div>
</xsl:template>
На выходе он не будет пихать в каждое <p> адрес неймспейса, он его будет пихать в общий тег <div>
Результат будет такой:
<div xmlns:x="http://ooo.lo">
	<p>
		...
	</p>
	<p>
		...
	</p>
</div>

exclude-result-prefixes="x" следует указать в xsl после задания адресов неймспейсов, чтобы в результате не прописывался адрес неймспейса.
Если несколько, то их индексы пишем через пробел.
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://lol.ru"
	xmlns:myxsl="http://ooo.lo">

Псевдонимы и пространства имен
<xsl:namespace-alias 
	stylesheet-prefix="prefix"
	result-prefix="prefix" />
Используется в случаях, если надо xml перегнать в xsl посредством xsl

пишем тег в документе xsl, он показывает, что надо будет заменить одно на другое
заводим новое пространство имен
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://lol.ru"
	xmlns:="http://ooo.lo"
	exclude-result-prefixes="x">

<xsl:namespace-alias 
	stylesheet-prefix="myxsl"
	result-prefix="xsl" />

<xsl:template match="/">
	<myxsl:stylesheet>
		<xsl:text>содержимое</xsl:text>
	</myxsl:stylesheet>
</xsl:template>

Использование ключей
По аналогии с базами данных, когда данных много
Когда у БД есть лист с ключами, ссылками, ярлыками, по которым ищут. Там усе упорядочено и поиск идет экономичнее - перебор не по одной записи, а по середине всех
Здесь так же, только не ссылки на листе, а дерево, там ноды, выборки
Это называется построить ключи

Ключи используются при однотипной выборке, т.е. когда одна выборка встречается несколько раз
Например:

<h1>Всего книг: 
<xsl:value-of select="count(/pricelist/book[price = 250])" />
штук</h1>
<xsl:apply-templates select="/pricelist/book[price = 250]" />

Используется тег <xsl:key />

<xsl:key
	name="keyName"
	match="pattern" выборка, которую надо удерживать
	use="expression" /> по чему строится ключ, что мы передаем для поиска

Внимание! В match нельзя использовать предикат (всякие соседы и т.д.), только ПРЯМАЯ ось, в функции key тоже нельзя всякие меньше - больше применять

Дальше для доступа к ключу используется функция key('keyName', 'value')
Внимание! Название ключа надо писать в кавычках, его значение - тоже, если это переменная или атрибут - то без!

В данном примере
<xsl:key
	name="keyName"
	match="/pricelist/book"
	use="price" />
<h1>Всего книг: 
<xsl:value-of select="count(key('keyName', 250))" />
штук</h1>
<xsl:apply-templates select="key('keyName', 250)" />

Совмещение ключей возможно, допустим, ищем цену и имя
<xsl:key
name="keyName2"
match="/pricelist/book"
use="concat(price, ':', author)" />
<xsl:value-of select="count(key('keyName2', 250:Alex))" />

Внимание!
В данном случае функция кеу возвращает путь до бука (путь, указанный в матче ключа!), то есть тег <book> и от результата надо плясать дальше, что выводить в value-of - его родителя, дочерний или какой...

По той же логике - если очень требуется использовать предикат, можно его использовать не внутри ключа, а после функции ключа, чтобы к результату функции приплюсовалось продолжение оси
<xsl:for-each select="key('keyKW', 'XSLT')[teachers/teacher = 'Шуков И.Г.']">
функция возвращает часть пути, к нему механически прицепляется кусок пути из [] и мы имеем нужный путь

Перегонка в файлы разных форматов. Выполняется через ту же трансформацию xsl 
За это отвечает тег (элемент) <xsl:output>

<xsl:output
	method="xml" - формат нужный
	encoding="utf-8" - кодировка, пойдет в первую строку будущего документа
	doctype-public="-//W3C//DTD XHTML 1.0 Transitional//EN" - это строка будущей декларации
	doctype-system="http://www.w3.org/1999/xhtml" - тоже строка для доктайпа верхнего будущего документа
	omit-xml-declsrstion="yes" - убрать ли xml декларацию, если no, то она вверху будет
	indent="yes" - отступы использовать или нет, если no, то все едино будет />

Для html будет такое:
<xsl:output
	method="html"
	encoding="utf-8"
	doctype-public="-//W3C//DTD HTML 4.01//EN"
	doctype-system="http://www.w3.org/TR/html4/strict.dtd"
	indent="yes" />

Для текстового такой:
<xsl:output	method="text" encoding="utf-8" />

У output есть атрибут cdata-section-elements 
cdata-section-elements="li h1" - перед тем, как отдать на выход, все li и все h1 оборачивается в секцию CDATA, чтобы не парсились
Это делается для того, чтобы динамические данные не страдали

Подключение другого файла. Тег <xsl:include /> и <xsl:import />

<xsl:include href="demo4.xsl" />
Внимание! include нельзя внутри шаблона, только вне

<xsl:import href="demo4.xsl" />
Должен быть ПЕРВЫМ ребенком после stylesheet-а, у импорта ниже приоритет, чем у инклюда

Конструкция <xsl:apply-imports /> указывает, что здесь надо использовать шаблоны из импортируемого файла

Конструкция document() то же самое, по сути, подключает файл, но сразу в него залазит и по указанному пути возвращает то, что надо
<xsl:value-of select="document('data-from-two-xml2.xml')/users/user[@login = current()/@author]/name" />
Обратиться можно и к этому же файлу, тогда надо оставить пустыми кавычки:
<xsl:value-of select="document('')/xsl:stylesheet/my:nameOfMonth/my:month[@no = substring(current()/@date, 6, 2)]" />
Так мы попадем в дерево текущего файла и можно сделать выборку

current()
Эта функция выбрасывает нас в текущий контекст.
То есть в начальный контекст операции
<xsl:template match="col"> попали в контекст <col>
	<xsl:element name="{/mydata/types/type[@col = current()/@no]/@name}"> здесь внутри мы уже в контексте <type>, current() ставит пред /@no сброс на <col>
		<xsl:value-of select="." />
	</xsl:element>
</xsl:template>

Дополнительные функции XSLT

generate-id()

<xsl:value-of select="generate-id(/catalog/book)" />
Генерирует уникальные идентификаторы, которые каждый раз новые и в разных браузерах разные, однораз

Если передать generate-id() набор элементов, то он возвращает сгенерированный id первого из них

Переменные в XSL
Если приходится несколько раз употреблять одни и те же пути - используются переменные, в которые это можно записывать
Используется тег <xsl:variable>

<xsl:variable
	name="name"
	select="expression">
	...
</xsl:variable>
НО! Нет оператора присваивания, поэтому в случае чего переменная просто пересоздается

Можно использовать name и писать переменную внутри тега, а можно использовать name и select и ссылаться по пути. В этом случае тег закрытый
Содержимое может быть любое

К переменной обращаемся через $имя и на его место он поставит содержимое переменной

Переменные могут быть глобальными и локальными. Глобальные - это когда мы их задаем вне других тегов в документе, в stylesheet-е
Локальные - например внутри цикла, внутри template

Еще один вид переменных - параметры. Тег <xsl:param>

<xsl:param
	name="paramName"
	select="expression">
	...
</xsl:param>

Это параметры для шаблона по аналогии с передаваемые параметрами функциям.
Как переменные, можно через имя и через путь селект задавать

Передать параметр шаблону можно через тег <xsl:with-param />
<xsl:template match="items">
	<xsl:with-param name="paramName1" />	
</xsl:template>

или c селектом
<xsl:call-template name="items">
<xsl:with-param name="value" select="$currentBook/price" />
</xsl:call-template>

А в подключаемом шаблоне 
<xsl:template name="items">
	<xsl:param name="paramName" />	
	<xsl:param name="pe2" />
	...	
</xsl:template>
Здесь шаблон ожидает параметры, которые ему надо передать выше
Если параметр может быть не передан, то можно задать умолчание 
<xsl:param name="background" select="'#fff'" />

Внутри шаблона обращение к его параметрам через $
Используется экранирование {}
<xsl:template name="textBlock">
<xsl:param name="background" select="'#fff'" />
<div style="border-bottom:1px dotted black;background-color:{$background}">
</xsl:template>

Выборка уникальных значений
Если, например, нужно отобрать по авторам с разными книгами
Узнается, что значение первое и уникальное - значит у него нет предыдущего соседа.
Используется группировка Мюнха (Стива Мюнха)
По ключам выбираем множество узлов по их свойствам.
Используется еще generate-id, который возвращает id первого элемента набора. Значит - уникальное

Задаем ключ ко всему, из чего будет идти выборка
<xsl:key name="ixAuthor" match="/pricelist/book/author" use="." />

Группировка Мюнха выглядит следующим образом:
<xsl:variable name="unicCity" select="/items/item[generate-id(.) = generate-id(key('keyCity', @city))]" />

XSL Formating Object (XSL FO)
Технология, позволяющая описать печатный лист
Выглядит как что-то вроде схемы
Для него нужен процессор, бесплатные - фня, платные только норм
У Apache есть, например, прога для этого

Где используется XML
Всякие X - Xlink, XPointer, XQuery
Для них есть соответствующие пространства имен
Xlink - аналог ссылки <a> в html, разные атрибуты
XPointer - аналог метки, закладки в адресной строке #
XQuery - язык запросов, это попытка объединить SQL, XPath с XML
RSS 
Стандарт, язык на основе xml
FB2
Все веб-службы и язык их описания - это XML
Есть еще языки для описывания формул математических, химических
SVG
Задается векторная графика в xml
Технология flash, векторная графика на этом

XML и Word
XML можно открывать в ворде, трансформировать там через xsl
Создать тоже можно XML, но там много наносного будет, неймспейсы всякие
Есть прием, когда из файла Ворд верстается документ, сохраняется в .docx, затем переименовываем в zip, распаковываем и в одной из папок выхватываем document.xml

XML и Excel
Можно в нем открыть xml, он и схему считывает, если она есть
Карты XML - это стиль
Он схему составляет, при сохранении через Excel
Если сохранить в виде книги, то так же через архив можно вытащить xml и схему тоже
Excel может таблицы выцеплять из интернета напрямую.
Там в меню есть "Данные" и через него - при этом сохраняется связь, если там данные в таблице меняются - то и в нашем документе все синхронизируется и меняется
Через InfoPath тоже можно по всякому программировать xml
Вносить данные удобно, подгоняя всякие выпадающие списки
И если его сохранять и переименовываем в zip - там готовая созданная схема, плюс шаблон создает, sempledata - то бишь то, как это будет выглядеть и xsl даже
Это прям конструктор







