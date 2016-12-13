<?php
/**
 * @author Dmitry Gladyshev <deel@email.ru>
 * @date 13.12.16 12:27
 */

namespace Yandex\Direct\Test;


use Yandex\Direct\ServiceFactory;


class ServiceFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ServiceFactory
     */
    private $factory;

    public function setUp()
    {
        $this->factory = new ServiceFactory();
    }

    /**
     * @expectedException \Yandex\Direct\Exception\InvalidArgumentException
     */
    public function testMustThrowInvalidArgumentExceptionOnCallWithIncorrectService()
    {
        $this->factory->createService('notexistingservice');
    }

    /**
     * @dataProvider providerYandexServices
     * @param $serviceName
     */
    public function testCreationService($serviceName)
    {
        $service = $this->factory->createService($serviceName);
        $this->assertInstanceOf('Yandex\\Direct\\Service\\' . $serviceName, $service);
        $this->assertInstanceOf('Yandex\\Direct\\Service', $service);
    }


    public function providerYandexServices()
    {
        return [
            ['AdExtensions'],
            ['AdGroups'],
            ['AdImages'],
            ['Ads'],
            ['AudienceTargets'],
            ['BidModifiers'],
            ['Bids'],
            ['Campaigns'],
            ['Changes'],
            ['Dictionaries'],
            ['DynamicTextAdTargets'],
            ['Keywords'],
            ['RetargetingLists'],
            ['Sitelinks'],
            ['VCards'],
        ];
    }
}