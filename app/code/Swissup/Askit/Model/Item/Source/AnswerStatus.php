<?php
namespace Swissup\Askit\Model\Item\Source;

class AnswerStatus implements \Magento\Framework\Data\OptionSourceInterface,\Magento\Framework\Option\ArrayInterface
{
    /**
     * @var \Swissup\Askit\Model\Item
     */
    protected $item;

    /**
     * Constructor
     *
     * @param \Swissup\Askit\Model\Item $item
     */
    public function __construct(\Swissup\Askit\Model\Item $item)
    {
        $this->item = $item;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        // $options[] = ['label' => '', 'value' => ''];
        $availableOptions = $this->item->getAnswerStatuses();
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return $this->item->getAnswerStatuses();
    }
}