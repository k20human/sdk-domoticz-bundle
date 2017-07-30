<?php

namespace M12U\Bundle\Sdk\DomoticzBundle\DependencyInjection\Compiler;



use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class ProxyPass
 * @package M12U\Bundle\Sdk\DomoticzBundle\DependencyInjection\Compiler
 */
class ProxyPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        $definition = "m12u.sdk.domoticz.compiler.proxy_chain";
        if (!$container->hasDefinition($definition)) {
            return;
        }

        $definition = $container->getDefinition($definition);
        $taggedServices = $container->findTaggedServiceIds('m12u.sdk.domoticz.proxy');

        foreach ($taggedServices as $id => $tags) {
            foreach ($tags as $attributes) {
                $definition->addMethodCall('addProxy', array(
                    new Reference($id),
                    new Reference('m12u.sdk.domoticz.client'),
                    new Reference('m12u.sdk.domoticz.provider.token'),
                    $attributes["alias"]
                ));
            }
        }
    }
}