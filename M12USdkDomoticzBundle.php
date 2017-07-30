<?php

namespace M12U\Bundle\Sdk\DomoticzBundle;

use M12U\Bundle\Sdk\DomoticzBundle\DependencyInjection\Compiler\ProxyPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Parameter;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class M12USdkDomoticzBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        $container->setParameter(
            'm12u.sdk.domoticz.provider.token.class',
            'M12U\Bundle\Sdk\DomoticzBundle\Provider\TokenProvider')
        ;

        $container
            ->register(
                'm12u.sdk.domoticz.provider.token',
                '%m12u.sdk.domoticz.provider.token.class%'
            )
            ->setArguments([
                new Parameter('m12u.sdk.domoticz.config.username'),
                new Parameter('m12u.sdk.domoticz.config.password'),
            ])
        ;

        $container->setParameter(
            'm12u.sdk.domoticz.compiler.proxy_chain.class',
            'M12U\Bundle\Sdk\DomoticzBundle\DependencyInjection\Compiler\ProxyChain');
        $container
            ->register(
                'm12u.sdk.domoticz.compiler.proxy_chain',
                '%m12u.sdk.domoticz.compiler.proxy_chain.class%'
            )
        ;

        $container->setParameter(
            'm12u.sdk.domoticz.provider_proxy.class',
            'M12U\Bundle\Sdk\DomoticzBundle\Provider\ProxyProvider'
        );
        $container
            ->register(
                'm12u.sdk.domoticz.provider_proxy',
                '%m12u.sdk.domoticz.provider_proxy.class%'
            )
            ->addArgument(new Reference('m12u.sdk.domoticz.compiler.proxy_chain'));

        $container->addCompilerPass(new ProxyPass());
    }
}
