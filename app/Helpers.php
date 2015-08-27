<?php namespace App;
use App\Money;
class Helpers {

	public static function getResiStatus($status){
		switch($status){
			case 0 : return 'Pending';break;
			case 1 : return 'Muat';break;
            case 2 : return 'Berangkat';break;
            case 3 : return 'Sudah Tiba';break;
			default: return 'Status tidak diketahui';
		}
	}

	public static function getQuoteStatus($status){
		switch($status){
			case 0 : return 'Pending';break;
			case 1 : return 'Process';break;
			default: return 'Status tidak diketahui';
		}
	}
	public static function awsomeFilterLabel($label,$content){
		return '<span class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-success btn-md disabled">'.$label.'</button>
                    </div>
                    <input class="form-control input-md" type="text" disabled value="'.$content.'"></input>
                </span>';
	}
    public static function currency($value,$decimal=0,$country=NULL,$vat=FALSE){
        switch($country){
            case "id" : $money = new Money("Rp ",$decimal,0.1,",","."); break;
            case "us" : $money = new Money("$ ",$decimal,0.2,".",","); break;
            default : $money = new Money("");
        }
        if(!$decimal){$money->setDecimal(0);}else{$money->setDecimal($decimal);}
        if(strip_tags(!isset($_POST['export']))){
            return $money->display($value);
        } else {
            return $value;
        }
    }
    
    public static function number($number,$decimal=0){
        return number_format($number,$decimal,",",".");
    }

    public static function number_parser($number,$lang='id_ID'){
        switch($lang){
            case 'id_ID' : {
                                $tmp = explode(',',$number);
                                if(count($tmp)>1){
                                    return $tmp[0].'.'.$tmp[1];
                                } else {
                                    return $tmp[0];
                                }                
                            };break;
            case 'en_US' : {
                                $tmp = explode('.',$number);
                                if(count($tmp)>1){
                                    return $tmp[0].','.$tmp[1];
                                } else {
                                    return $tmp[0];
                                }                
                            };break;
        }

    }
    
    public static function dateToMySqlSystem($date){
        /*//$result = date_create_from_format("d-m-Y",$date);
        $result = date_create_from_format("d-m-Y",$date);
        //return $result->format("Y-m-d");
        return date_create($result, "Y-m-d");*/
        return !$date?'-':\Carbon\Carbon::parse($date)->format('Y-m-d');
    }
    
    public static function dateFromMySqlSystem($date){
        /*$result = date_create_from_format("Y-m-d",$date);
        //return $result->format("d-m-Y");
        return date_format($result,"d-m-Y");*/
        return !$date?'-':\Carbon\Carbon::parse($date)->format('d-m-Y');
    }
}