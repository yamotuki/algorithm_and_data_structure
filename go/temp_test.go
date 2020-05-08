package main

import (
	"fmt"
	"github.com/stretchr/testify/assert"
	"math"
	"testing"
)

/*func main() {
	res := findContentChildren([]int{1, 2, 3}, []int{1, 1})
	fmt.Println(res)

	res2 := findContentChildren([]int{10, 9, 8, 7}, []int{5, 6, 7, 8})
	fmt.Println(res2)

	res3 := findContentChildren([]int{2, 1}, []int{3, 1, 2})
	fmt.Println(res3)

}*/

func TestFunc(t *testing.T) {

	rightNode2 := TreeNode{2, nil, nil}
	rightNode1 := TreeNode{2, nil, &rightNode2}
	node := TreeNode{1, nil, &rightNode1}

	fmt.Printf("%s\n", node)

	assert.Equal(t, []int{2}, findMode(&node))
}

type TreeNode struct {
	Val   int
	Left  *TreeNode
	Right *TreeNode
}

func findMode(root *TreeNode) []int {
	node := root
	var mapping map[int]int

	dig(node, &mapping)

	var_dump(mapping)

	return []int{1}
	// TODO find most popular number in mapping
}

func dig(node *TreeNode, mapping *map[int]int) {
	if node.Left != nil {
		dig(node.Left, mapping)
	}
	if node.Right != nil {
		dig(node.Right, mapping)
	}

	_, ok := (*mapping)[node.Val]
	if ok == true {
		(*mapping)[node.Val]++
	} else {
		(*mapping)[node.Val] = 1
	}
}

func max(nums ...int) int {
	if len(nums) == 0 {
		panic("funciton max() requires at least one argument.")
	}
	res := nums[0]
	for i := 0; i < len(nums); i++ {
		res = int(math.Max(float64(res), float64(nums[i])))
	}
	return res
}

func var_dump(v ...interface{}) {
	for _, vv := range (v) {
		fmt.Printf("%#v\n", vv)
	}
}
