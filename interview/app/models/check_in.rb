class CheckIn < ApplicationRecord
  belongs_to :patient
  has_many :questionaries
end
