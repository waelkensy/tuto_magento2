<?php


namespace Wlks\Formation\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

/**
 * Class PointOfSalesAction
 *
 * @author Yannick Waelkens <yannick.waelkens@cgi.com>
 */
class PointOfSalesAction extends Column
{
    /**
     * @var UrlInterface
     */
    private $urlInterface;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        array $components = [],
        array $data = [],
        UrlInterface $urlInterface
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->urlInterface = $urlInterface;
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     *
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $item[$this->getData('name')]['edit']   = [
                    'href'   => $this->urlInterface->getUrl(
                        'pointofsales/pointofsales/edit',
                        ['id' => $item['id']]
                    ),
                    'label'  => __('Edit'),
                    'hidden' => false,
                ];
                $item[$this->getData('name')]['delete'] = [
                    'href'   => $this->urlInterface->getUrl(
                        'pointofsales/pointofsales/delete',
                        ['id' => $item['id']]
                    ),
                    'label'  => __('Delete'),
                    'hidden' => false,
                ];
            }
        }

        return $dataSource;
    }
}
