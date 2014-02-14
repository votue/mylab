<?php
/**
 * Index controller Home page
 */

class IndexController extends AdminBaseController {
	/**
	 * init
	 */
	const LIMIT_BOARD = 5;
	const LIMIT_USER = 6;
	public function init()
	{
		parent::init();
		
		$this->breadcrumbs[ Yii::t('adminglobal', 'Dashboard') ] = array('index/index');
		$this->pageTitle[] = Yii::t('adminglobal', 'Dashboard'); 
	}


	public function actionIndex(){
		$lastBoard = Board::model()->findAll(array('order'=>'created desc','limit'=>self::LIMIT_BOARD));
		$lastMember = Members::model()->findAll(array('order'=>'id desc','limit'=>self::LIMIT_USER));
        $members = Members::model()->findAll();
        $populars = Buzzer::findPopurlars(10);
        $adminpopulars = Buzzer::findAdminPopurlars(25);
		$this->render('index', compact('lastBoard','lastMember','members','populars','adminpopulars'));
	}


	/**
	 * Index action
	 */
    /*public function actionIndex() {
		$title_members = 'Pendding Members';
		$title_invoices = 'Pendding Invoices';
		$title_cashout = 'Pendding Cashout';
		$title_posts = 'Pendding Blog Posts';
		$title_emails = 'Unread Emails';
		
		$cap_members = 'red';
		$cap_invoices = 'red';
		$cap_cashout = 'red';
		$cap_posts = 'red';
		$cap_emails = 'red';
		
		$totalmembers = Members::model()->count("vericode != ''");
		if($totalmembers == 0)
		{
			$totalmembers = Members::model()->count();
			$title_members = 'Total Members';
			$cap_members = 'green';
		}
		
		$totalinvoices = Transactions::model()->count("transactiontype='purchase' AND paymentstatus=1");
		if($totalinvoices == 0)
		{
			$totalinvoices = Transactions::model()->count("transactiontype='purchase'");
			$title_invoices = 'Total Invoices';
			$cap_invoices = 'green';
		}
		
		$totalcashout = Transactions::model()->count("transactiontype='cashout' AND paymentstatus=1 AND payment_transaction=''");
		if($totalcashout == 0)
		{
			$totalcashout = Transactions::model()->count("transactiontype='cashout'");
			$title_cashout = 'Total Cashout';
			$cap_cashout = 'green';
		}
		
		$totalposts = Blog::model()->count("status=0");
		if($totalposts == 0)
		{
			$totalposts = Blog::model()->count();
			$title_posts = 'Total Blog Posts';
			$cap_posts = 'green';
		}
		
		$totalemails = ContactUs::model()->count("sread=0");
		if($totalemails == 0)
		{
			$totalemails = ContactUs::model()->count();
			$title_emails = 'Total Emails';
			$cap_emails = 'green';
		}
		
		
		
		
		
		
		$last30 = array();
		$maxamount = 10;
		
		for($i=29; $i>=0; $i--)
		{
			$cdate = strtotime('-'.$i.' day');
			$y = date('Y', $cdate);
			$m = date('m', $cdate);
			$d = date('d', $cdate);
			
			$cond = "AND YEAR(created)=" . date('Y', $cdate) . "
				AND MONTH(created)=" . date('m', $cdate) . "
				AND DAY(created)=" . date('d', $cdate) . "";
			
			$sum1 = Yii::app()->db->createCommand("SELECT -SUM(amount) as sum FROM transactions WHERE
					transactiontype='purchase' AND paymentstatus>0 " . $cond )->queryScalar();
			if(!$sum1) $sum1 = 0;
			if($maxamount < $sum1) $maxamount = $sum1;
			
			$sum2 = Yii::app()->db->createCommand("SELECT SUM(amount) as sum FROM transactions WHERE
					transactiontype='affiliate' " . $cond )->queryScalar();
			if(!$sum2) $sum2 = 0;
			if($maxamount < $sum2) $maxamount = $sum2;
			
			$sum3 = Yii::app()->db->createCommand("SELECT -SUM(amount) as sum FROM transactions WHERE
					transactiontype='cashout' AND paymentstatus>0 " . $cond )->queryScalar();
			if(!$sum3) $sum3 = 0;
			if($maxamount < $sum3) $maxamount = $sum3;
			
			$last30[] = array('sum1'=>$sum1, 'sum2'=>$sum2, 'sum3'=>$sum3, 'created'=>date('d-m',$cdate));
		}
		
		if($maxamount > 10)
		{
			$maxamount = intval($maxamount/10)*10+10;
		}
		
		
		$suminvoices['completed'] = Yii::app()->db->createCommand("SELECT -SUM(amount) as sum FROM transactions WHERE
					transactiontype='purchase' AND paymentstatus=2")->queryScalar();
		$suminvoices['pendding'] = Yii::app()->db->createCommand("SELECT -SUM(amount) as sum FROM transactions WHERE
					transactiontype='purchase' AND paymentstatus=1")->queryScalar();
		$suminvoices['total'] = $suminvoices['completed']+$suminvoices['pendding'];
		$sumearnings = Yii::app()->db->createCommand("SELECT SUM(amount) as sum FROM transactions WHERE
					transactiontype='affiliate'")->queryScalar();
		$sumcashout = Yii::app()->db->createCommand("SELECT -SUM(amount) as sum FROM transactions WHERE
					transactiontype='cashout' AND paymentstatus>0")->queryScalar();
		
		$sumdownloads['total'] = Yii::app()->db->createCommand("SELECT SUM(downloads) as sum FROM userdownloads")->queryScalar();
		$sumdownloads['new'] = Yii::app()->db->createCommand("SELECT count(downloads) FROM userdownloads")->queryScalar();
		if($sumdownloads['total']>0) $sumdownloads['new'] = round(($sumdownloads['new']/$sumdownloads['total'])*100, 2);
		else $sumdownloads['new'] = 0;
		$sumdownloads['returning'] = round(100-$sumdownloads['new'], 2);
		
        $this->render('index', array(	'totalmembers'=>$totalmembers,
										'totalinvoices'=>$totalinvoices,
										'totalcashout'=>$totalcashout,
										'totalposts'=>$totalposts,
										'totalemails'=>$totalemails,
										
										'title_members'=>$title_members,
										'title_invoices'=>$title_invoices,
										'title_cashout'=>$title_cashout,
										'title_posts'=>$title_posts,
										'title_emails'=>$title_emails,
										
										'cap_members'=>$cap_members,
										'cap_invoices'=>$cap_invoices,
										'cap_cashout'=>$cap_cashout,
										'cap_posts'=>$cap_posts,
										'cap_emails'=>$cap_emails,
										
										'last30'=>$last30, 'maxamount'=>$maxamount,
										
										'suminvoices'=>$suminvoices, 'sumearnings'=>$sumearnings, 'sumcashout'=>$sumcashout, 'sumdownloads'=>$sumdownloads
									));
    }*/
}