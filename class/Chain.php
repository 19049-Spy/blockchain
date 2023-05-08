<?php

require './class/Block.php';
require './interface/IChain.php';

class Chain implements IChain {
    private $blocks = [];

    public function __construct($blocks = []) {
        $this->blocks = $blocks;
    }

    public function addBlock(Block $block): Chain {
        array_push($this->blocks, $block);
        return $this;
    }

    public function getBlock(int $id): ?Block {
        foreach ($this->blocks as $block) {
            if ($block->getId() === $id) {
                return $block;
            }
        }
        return null;
    }

    public function getLastBlock(): ?Block {
        $blocksLength = count($this->blocks);
        if ($blocksLength !== 0) {
            return $this->blocks[$blocksLength - 1];
        }
        return null;
    }

    public function isValid(): bool {
        for ($i = 1; $i < count($this->blocks); $i++) {
            $currentBlock = $this->blocks[$i];
            $previousBlock = $this->blocks[$i - 1];
            if ($currentBlock->getHash() !== $currentBlock->generateHash()) {
                return false;
            }
            if ($currentBlock->getId() !== $previousBlock->getId() + 1) {
                return false;
            }
        }
        return true;
    }
}
