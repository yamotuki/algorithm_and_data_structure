package main

import (
	"fmt"
	"github.com/stretchr/testify/assert"
	"math"
	"strconv"
	"testing"
)

func TestFunc(t *testing.T) {
	assert.Equal(t, 9, evalRPN([]string{"2", "1", "+", "3", "*"}))
	assert.Equal(t, 22, evalRPN([]string{"10", "6", "9", "3", "+", "-11", "*", "/", "*", "17", "+", "5", "+"}))
}

func evalRPN(tokens []string) int {
	var stack []int
	length := len(tokens)

	for i := 0; i < length; i++ {
		if tokens[i] == "+" || tokens[i] == "-" || tokens[i] == "*" || tokens[i] == "/" {
			// pop
			first := stack[len(stack)-1]
			second := stack[len(stack)-2]
			stack = stack[:len(stack)-2]

			if tokens[i] == "+" {
				stack = append(stack, second+first)
			} else if tokens[i] == "-" {
				stack = append(stack, second-first)
			} else if tokens[i] == "*" {
				stack = append(stack, second*first)
			} else if tokens[i] == "/" {
				stack = append(stack, second/first)
			}
		} else {
			val, _ := strconv.Atoi(tokens[i])
			stack = append(stack, val)
		}
	}

	return stack[len(stack)-1]
}

type TreeNode struct {
	Val   int
	Left  *TreeNode
	Right *TreeNode
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
