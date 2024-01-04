<?php

namespace EasyCorp\Bundle\EasyAdminBundle\ArgumentResolver;

use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Provider\AdminContextProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\Controller\ValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;

/*
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
if (interface_exists(ValueResolverInterface::class)) {
    final class AdminContextResolver implements ValueResolverInterface
    {
        public function __construct(
            private AdminContextProviderInterface $adminContextProvider
        ) {
        }

        public function resolve(Request $request, ArgumentMetadata $argument): iterable
        {
            if (AdminContext::class !== $argument->getType()) {
                return [];
            }

            yield $this->adminContextProvider->getContext();
        }
    }
} else {
    final class AdminContextResolver implements ArgumentValueResolverInterface
    {
        public function __construct(
            private AdminContextProviderInterface $adminContextProvider
        ) {
        }

        public function supports(Request $request, ArgumentMetadata $argument): bool
        {
            return AdminContext::class === $argument->getType();
        }

        public function resolve(Request $request, ArgumentMetadata $argument): iterable
        {
            yield $this->adminContextProvider->getContext();
        }
    }
}
