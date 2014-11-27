<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
        
        /*
         * Metodo que crea para vaildar si un dato existe y no esta en blanco
         */
        protected function noBlanco($dato)
        {
            if (isset($dato) && !is_null($dato) && !empty($dato)) {
                return true;
            } 
            else
                return false;
        }
        
        /*protected function noBlanco($dato)
        {
            if (isset($dato) && !is_null($dato)) {
                return $dato;
            } 
            elseif(empty($dato)) {
                if(is_numeric($var))
                    return 0;
                else
                    return '';
            }
        }*/

}
