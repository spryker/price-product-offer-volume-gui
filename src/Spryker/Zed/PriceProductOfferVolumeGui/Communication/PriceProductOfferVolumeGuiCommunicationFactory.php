<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PriceProductOfferVolumeGui\Communication;

use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use Spryker\Zed\PriceProductOfferVolumeGui\Communication\Reader\PriceProductOfferVolumeReader;
use Spryker\Zed\PriceProductOfferVolumeGui\Communication\Reader\PriceProductOfferVolumeReaderInterface;
use Spryker\Zed\PriceProductOfferVolumeGui\Dependency\Facade\PriceProductOfferVolumeGuiToProductOfferFacadeInterface;
use Spryker\Zed\PriceProductOfferVolumeGui\Dependency\Service\PriceProductOfferVolumeGuiToUtilEncodingServiceInterface;
use Spryker\Zed\PriceProductOfferVolumeGui\PriceProductOfferVolumeGuiDependencyProvider;

/**
 * @method \Spryker\Zed\PriceProductOfferVolumeGui\PriceProductOfferVolumeGuiConfig getConfig()
 */
class PriceProductOfferVolumeGuiCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return \Spryker\Zed\PriceProductOfferVolumeGui\Communication\Reader\PriceProductOfferVolumeReaderInterface
     */
    public function createPriceProductOfferVolumeReader(): PriceProductOfferVolumeReaderInterface
    {
        return new PriceProductOfferVolumeReader($this->getUtilEncodingService());
    }

    /**
     * @return \Spryker\Zed\PriceProductOfferVolumeGui\Dependency\Facade\PriceProductOfferVolumeGuiToProductOfferFacadeInterface
     */
    public function getProductOfferFacade(): PriceProductOfferVolumeGuiToProductOfferFacadeInterface
    {
        return $this->getProvidedDependency(PriceProductOfferVolumeGuiDependencyProvider::FACADE_PRODUCT_OFFER);
    }

    /**
     * @return \Spryker\Zed\PriceProductOfferVolumeGui\Dependency\Service\PriceProductOfferVolumeGuiToUtilEncodingServiceInterface
     */
    public function getUtilEncodingService(): PriceProductOfferVolumeGuiToUtilEncodingServiceInterface
    {
        return $this->getProvidedDependency(PriceProductOfferVolumeGuiDependencyProvider::SERVICE_UTIL_ENCODING);
    }
}
