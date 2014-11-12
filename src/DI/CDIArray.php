<<<<<<< HEAD
<?php
/**
 * Anax base class for wrapping sessions.
 */

namespace Anax\DI;

class CDIArray extends Anax\DI implements ArrayInterface
{
    
    /**
     * Properties
     *
     */
    public $data = [];        // Store all configuration options here



    /**
     * Construct.
     *
     * @param array $options to configure options.
     */
    private function __construct($options = [])
    {
        ;
    }


    /**
     * Construct.
     *
     * @param array $options to configure options.
     */
    public function offsetSet($offset, $value) 
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } 
        else {
            $this->container[$offset] = $value;
        }
    }



    /**
     * Construct.
     *
     * @param array $options to configure options.
     */
    public function offsetExists($offset) {
        return isset($this->container[$offset]);
    }



    /**
     * Construct.
     *
     * @param array $options to configure options.
     */
    public function offsetUnset($offset) 
    {
        unset($this->container[$offset]);
    }



    /**
     * Construct.
     *
     * @param array $options to configure options.
     */
    public function offsetGet($offset) 
    {
        return isset($this->container[$offset]) 
            ? $this->container[$offset] 
            : null;
    }
}
=======
<?php
/**
 * A CDI version implementing the array interface.
 */

namespace Anax\DI;

class CDIArray extends CDI implements \ArrayAccess
{
    
    /**
     * Properties
     *
     */
    public $data = [];        // Store all configuration options here



    /**
     * Construct.
     *
     * @param array $options to configure options.
     */
    public function __construct($options = [])
    {
        parent::__construct();
    }


    /**
     * Construct.
     *
     * @param array $options to configure options.
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }



    /**
     * Construct.
     *
     * @param array $options to configure options.
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }



    /**
     * Construct.
     *
     * @param array $options to configure options.
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }



    /**
     * Construct.
     *
     * @param array $options to configure options.
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset])
            ? $this->container[$offset]
            : null;
    }
}
>>>>>>> eabc4f016b370e1e73f609a4aa3cd14d2b056f6b
