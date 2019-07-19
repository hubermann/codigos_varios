class QuestionariesController < ApplicationController
    def new
      @questionarie = Questionarie.create(label: "PHQ2")
    end
  
   
  end
  