import Foundation

class Cart{
    var meals: Array<Meal>
    var totalPrice: Double

    init()
    {
        self.meals = []
        self.totalPrice = 0
    }

    func addMeal(meal:Meal){
        self.meals.append(meal)
        //print(self.meals[0].mealName)
        self.totalPrice += meal.getPrice()
       // print(self.totalPrice)
    }
}