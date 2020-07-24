<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PriceProductOfferVolumeGui;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\PriceProductOfferVolumeGui\Dependency\Client\PriceProductOfferVolumeGuiToPriceProductOfferVolumeClientBridge;
use Spryker\Zed\PriceProductOfferVolumeGui\Dependency\Facade\PriceProductOfferVolumeGuiToProductOfferFacadeBridge;
use Spryker\Zed\PriceProductOfferVolumeGui\Dependency\Service\PriceProductOfferVolumeGuiToUtilEncodingServiceBridge;

/**
 * @method \Spryker\Zed\PriceProductOfferVolumeGui\PriceProductOfferVolumeGuiConfig getConfig()
 */
class PriceProductOfferVolumeGuiDependencyProvider extends AbstractBundleDependencyProvider
{
    public const SERVICE_UTIL_ENCODING = 'SERVICE_UTIL_ENCODING';
    public const CLIENT_PRICE_PRODUCT_OFFER_VOLUME = 'CLIENT_PRICE_PRODUCT_OFFER_VOLUME';
    public const FACADE_PRODUCT_OFFER = 'FACADE_PRODUCT_OFFER';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideCommunicationLayerDependencies(Container $container)
    {
        $container = parent::provideCommunicationLayerDependencies($container);

        $container = $this->addProductOfferFacade($container);
        $container = $this->addPriceProductOfferVolumeClient($container);
        $container = $this->addUtilEncodingService($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addProductOfferFacade(Container $container): Container
    {
        $container->set(static::FACADE_PRODUCT_OFFER, function (Container $container) {
            return new PriceProductOfferVolumeGuiToProductOfferFacadeBridge(
                $container->getLocator()->productOffer()->facade()
            );
        });

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addPriceProductOfferVolumeClient(Container $container): Container
    {
        $container->set(static::CLIENT_PRICE_PRODUCT_OFFER_VOLUME, function (Container $container) {
            return new PriceProductOfferVolumeGuiToPriceProductOfferVolumeClientBridge(
                $container->getLocator()->priceProductOfferVolume()->client()
            );
        });

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addUtilEncodingService(Container $container): Container
    {
        $container->set(static::SERVICE_UTIL_ENCODING, function (Container $container) {
            return new PriceProductOfferVolumeGuiToUtilEncodingServiceBridge(
                $container->getLocator()->utilEncoding()->service()
            );
        });

        return $container;
    }
}