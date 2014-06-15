<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Serializer;

use JMS\Serializer\SerializerInterface;
use Xabbuh\XApi\Common\Model\StatementInterface;

/**
 * Serialize and deserialize {@link \Xabbuh\XApi\Common\Model\StatementInterface statements}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementSerializer implements StatementSerializerInterface
{
    /**
     * @var SerializerInterface The underlying serializer
     */
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * {@inheritDoc}
     */
    public function serializeStatement(StatementInterface $statement)
    {
        return $this->serializer->serialize($statement, 'json');
    }

    /**
     * {@inheritDoc}
     */
    public function serializeStatements(array $statements)
    {
        return $this->serializer->serialize($statements, 'json');
    }

    /**
     * {@inheritDoc}
     */
    public function deserializeStatement($data)
    {
        return $this->serializer->deserialize(
            $data,
            'Xabbuh\XApi\Common\Model\Statement',
            'json'
        );
    }

    /**
     * {@inheritDoc}
     */
    public function deserializeStatements($data)
    {
        return $this->serializer->deserialize(
            $data,
            'array<Xabbuh\XApi\Common\Model\Statement>',
            'json'
        );
    }
}
