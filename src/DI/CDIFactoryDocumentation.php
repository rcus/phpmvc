<<<<<<< HEAD
<?php

namespace Anax\DI;

/**
 * Extended factory for Anax documentation.
 *
 */
class CDIFactoryDocumentation extends CDIFactoryDefault
{
   /**
     * Construct.
     *
     */
    public function __construct()
    {
        parent::__construct();

        $this->set('documentation', function() {
            $fc = new \Anax\Content\CFileContent();
            $fc->setBasePath(ANAX_INSTALL_PATH . 'docs/');
            return $fc;
        });
    }
}
=======
<?php

namespace Anax\DI;

/**
 * Extended factory for Anax documentation.
 *
 */
class CDIFactoryDocumentation extends CDIFactoryDefault
{
   /**
     * Construct.
     *
     */
    public function __construct()
    {
        parent::__construct();

        $this->set('documentation', function () {
            $fc = new \Anax\Content\CFileContent();
            $fc->setBasePath(ANAX_INSTALL_PATH . 'docs/documentation');
            return $fc;
        });

        $this->theme->setVariable('style', "article {max-width: 650px;}");
        $this->theme->setBaseTitle(" - Anax documentation");
    }
}
>>>>>>> eabc4f016b370e1e73f609a4aa3cd14d2b056f6b
