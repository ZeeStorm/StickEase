<?
class err {

	var $code = 0;
	var $msg = '';

	public function err( $intCode=0, $strMsg='' )
	{
		$this->code = $intCode;
		$this->msg = $strMsg;

		return $this;
	}
}