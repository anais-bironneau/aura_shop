<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerXyhg0jd\appProdProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerXyhg0jd/appProdProjectContainer.php') {
    touch(__DIR__.'/ContainerXyhg0jd.legacy');

    return;
}

if (!\class_exists(appProdProjectContainer::class, false)) {
    \class_alias(\ContainerXyhg0jd\appProdProjectContainer::class, appProdProjectContainer::class, false);
}

return new \ContainerXyhg0jd\appProdProjectContainer([
    'container.build_hash' => 'Xyhg0jd',
    'container.build_id' => 'c3dc79b2',
    'container.build_time' => 1618649327,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerXyhg0jd');