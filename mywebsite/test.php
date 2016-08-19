<?php 
	/**
	* MyClass
	*/
	class MyClass
	{
		//thuoc tinh prop1 cua class
		public $prop1 = "class prop1<br>";
		//thuoc tinh static
		public static $count = 0;
		//ham tao cua class

		public function __construct(){
			// magic __class__ tra ve ten class
			echo 'The class ',__class__ , ' was initiated!<br />'; 
		}

		//ham huy cua class 
		public function __destruct(){
			echo "the class ",__class__, " was destroyed<br>";
		}

		//ham convert sang chuoi
		public function __tostring(){
			//return 
			return $this->prop1;
		}

		//phuong thuc SetProp cua class,
		//thay doi gia tri cua prop1
		Public function SetProp($newProp){
			$this->prop1 = $newProp;
		}
		//Phupng thuc GetProp cua class, 
		//tra ve gia tri cua prop 1
		Public function GetProp(){
			return $this->prop1;
		}

		//phuong thuc static
		Public static function PlusOne(){
			echo "the count is ".++self::$count."<br>";
		}

	}//end myclass
	

	//class khac duoc mo rong tu myclass
	/**
	* other class
	*/
	class MyOtherClass extends MyClass
	{
		//nap chong ham tao
		public function __construct(){
			//goi ham constructor tu lop cha
			parent:: __construct();
			echo "a new constructor in ".__class__."<br>";
		}
		public function newMethod()
		{
			# code...
			echo "from a new method in ".__class__." <br>";
		}
	}//ket thuc myotherclass

	//tao doi tuong myotherclass
	$newobj = new MyOtherClass;
	$newobj->newMethod();
	//su dung 1 phuong thuc cua class cha
	echo $newobj->GetProp();
	do{
		$newobj::PlusOne();
	}while ($newobj::$count<10);
	
 ?>

<?php 
//tam vuc cho thuoc tinh va phuong thuc
//co 3 gia tri 
//public

#private
	//chi goi duoc trong pham vi class da khai bao no
//protected
	//chi goi duoc trong noi bo class
	//va cac class con cua no
//static
	//cho phep thuoc tinh va phuong thuc
	//co the duoc truy cap
	//ma khong can khoi tao class
//public
	//mac dinh la public
	//co the goi bat cu dau, trong lan ngoai class
 ?>