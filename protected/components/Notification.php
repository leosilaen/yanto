<?php 
Yii::import('zii.widgets.CPortlet');
 
class Notification extends CPortlet
{
    //public $title='Pemberitahuan';
    public $maxNotif=10;
 
    public function getComments()
    {
         if(Yii::app()->user->isAkuntansi()){
        return RiwayatAlurBerkas::model()->findNewNotif($this->maxNotif);
        }elseif (Yii::app()->user->isPerbendaharaan()) {
          return RiwayatAlurBerkas::model()->findNewNotif1($this->maxNotif);
        }
    }
 
    protected function renderContent()
    {
        $this->render('pemberitahuan');
    }
}
?>